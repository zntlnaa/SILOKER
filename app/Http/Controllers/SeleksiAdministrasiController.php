<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencaker;
use App\Models\Loker;
use App\Models\Tahapan_apply;

class SeleksiAdministrasiController extends Controller
{
    public function seleksi_administrasi($idloker)
    {
        // Dapatkan data pencaker yang telah mendaftar untuk loker ini
        $data = Pencaker::join('apply_loker', 'pencaker.noktp', '=', 'apply_loker.noktp')
            ->join('tahapan_apply', 'apply_loker.idapply', '=', 'tahapan_apply.idapply')
            ->join('tahapan', 'tahapan_apply.idtahapan', '=', 'tahapan.idtahapan')
            ->select('apply_loker.idapply as id_apply', 'pencaker.nama', 'tahapan.nama as tahapan', 'tahapan_apply.nilai as nilai')
            ->where('apply_loker.idloker', $idloker)
            ->where('tahapan.nama', 'Seleksi Administrasi')
            ->paginate(5);

        // Kirim data ke view untuk ditampilkan
        $namaLoker = Loker::where('idloker', $idloker)->value('nama');
        return view('seleksi_administrasi', ['data' => $data, 'namaLoker' => $namaLoker, 'idloker' => $idloker]);
    }

    public function saveData(Request $request) {
        // Ambil data dari request
        $idApply = $request->input('idapply');
        $nilai = $request->input('nilai');
    
        // Simpan data ke database
        $data = Tahapan_apply::where('id_apply', $idApply)->update(['nilai' => $nilai]);
    
        // Set pesan berhasil ke sesi
        return redirect()->back()->with('success', 'Data berhasil tersimpan');
    }
    

}
