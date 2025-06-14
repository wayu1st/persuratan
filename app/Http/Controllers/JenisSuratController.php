<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    //
    public function index(){
        //$jenis_surat = JenisSurat::all();
        $data = [
            'jenis_surat' => JenisSurat::all()
        ];
        return view('jenissurat.index',$data);
    }

    public function tambah(){
        return view('jenissurat.tambah');
    }

    public function simpan(Request $request){
        $data = $request->validate([
            'jenis_surat' => ['required']
        ]);

        //memeriksa id_jenis_surat ada

        if(isset($request->id_jenis_surat)):
            //update jika id_jenis_surat ditemukan
            $update = JenisSurat::where('id_jenis_surat','=',$request->id_jenis_surat)->update($data);
            if($update){
                return redirect('/dashboard/jenissurat');
            }else{
                return redirect('/dashboard/jenissurat/tambah');
            }
        else:
            //tambah data baru jenis_surat
            $insert = JenisSurat::create($data);
            if($insert){
                return redirect('/dashboard/jenissurat');
            }else{
                return redirect('/dashboard/jenissurat/tambah');
            }

        endif;
    }

    public function edit(Request $request){
        //query ke database berdasarkan $request->id

        $data = [
            'jnsSurat' => JenisSurat::where('id_jenis_surat',$request->id)->first()
        ];

        return view('jenissurat.edit',$data);
    }

    public function hapus(Request $request)
    {
        // Validate the request to ensure id_jenis_surat is present
        $request->validate([
            'id_jenis_surat' => 'required|exists:jenis_surat,id_jenis_surat'
        ]);
        // Attempt to delete the record
        $hapus = JenisSurat::where('id_jenis_surat', $request->id_jenis_surat)->delete();
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
