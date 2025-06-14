<?php

namespace App\Http\Controllers;

use App\Models\TblUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class TblUserController extends Controller

{
    //
    //halaman manage user hanya untuk super admin
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new TblUser;
    }
    //
    public function index(){
        $data = [
            'user' => $this->userModel->all()
        ];
        
        return view('pengguna.index',$data);
    }

    public function tambah(){
        return view('pengguna.tambah');
    }

    public function simpan(Request $request){
        $data = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]
        );

        if($data):
            // Check if user with the same username exists
            $existingUser = $this->userModel->where('username', $data['username'])->first();
            if ($existingUser) {
                // User already exists, handle accordingly
                return back()->withErrors(['username' => 'Username sudah terdaftar'])->withInput();
            }
            $data['password'] = Hash::make($data['password']);
            if($this->userModel->create($data)):
                return redirect('/dashboard/manage-pengguna')->with('success','Pengguna baru berhasil ditambahkan');
            else:
                return redirect('/dashboard/manage-pengguna')->with('error','Gagal menambahkan pengguna');
            endif;
        else:

        endif;

        if(isset($request->id_user)):
            //update jika id_user ditemukan
            $update = TblUser::where('id_user','=',$request->id_user)->update($data);
            if($update){
                return redirect('/dashboard/manage-pengguna');
            }else{
                return redirect('/dashboard/manage-pengguna/tambah');
            }
        else:
            //tambah data baru jenis_surat
            $insert = TblUser::create($data);
            if($insert){
                return redirect('/dashboard/manage-pengguna');
            }else{
                return redirect('/dashboard/manage-pengguna/tambah');
            }

        endif;
    }

    public function edit(Request $request){
        //query ke database berdasarkan $request->id

        $data = [
            'idUser' => TblUser::where('id_user',$request->id)->first()
        ];

        return view('pengguna.edit',$data);
    }

    public function hapus(Request $request)
    {
        
        $request->validate([
            'id_user' => 'required|exists:tbl_user,id_user' 
        ]);
       
        $relatedCount = RelatedModel::where('user_id', $request->id_user)->count();
        if ($relatedCount > 0) {
            return response()->json([
                'status' => false,
                'pesan' => "Data gagal dihapus, ada data terkait yang harus dihapus terlebih dahulu."
            ]);
        }
        // Attempt to delete the user record
        $hapus = TblUser ::where('id_user', $request->id_user)->delete();
        // Prepare response message
        if ($hapus) {
            $pesan = [
                'status' => true,
                'pesan' => "Data berhasil dihapus"
            ];
        } else {
            $pesan = [
                'status' => false,
                'pesan' => "Data gagal dihapus"
            ];
        }
        return response()->json($pesan);
    }
}
