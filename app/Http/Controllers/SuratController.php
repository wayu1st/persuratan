<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;
use App\Models\JenisSurat;
use App\Models\TblUser;


class SuratController extends Controller
{
    //
    public function index()
    {
        $data = [
            'surat' => Surat::all()
        ];
        return view('surat.index',$data);
    }

    public function tambah(){
        $data = [
            'jenis_surat' => JenisSurat::all(),
            'id_user' => TblUser::all(),
            'username' => TblUser::all()
        ];
        return view('surat.tambah',$data);
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'id_jenis_surat' => 'required|exists:jenis_surats,id',
            'id_user' => 'required',
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required',
            'ringkasan' => 'nullable',
            'file' => 'nullable'
        ]);
            // Handle file upload
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->simpan('file', 'public');
        }
        try {
            // Create the Surat record
            Surat::create($validated);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to save data.']);
        }
        return redirect('/dashboard/surat')->with('success', 'Surat created successfully.');
    }

}
