<?php

namespace App\Http\Controllers;
use App\Models\Tahapan_apply;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    // Menampilkan pencaker yang telah apply untuk seleksi administrasi
    public function seleksiAdministrasi()
    {
        // Ambil data pencaker yang apply di tahap seleksi administrasi
        $data = Tahapan_apply::with(['applyLoker', 'applyLoker.pencaker'])
            ->where('idtahapan', 1) // 1 adalah ID untuk tahap seleksi administrasi
            ->get();

        return view('seleksiAdministrasi', ['data' => $data]);
    }

    // Menyimpan hasil seleksi administrasi
    public function simpanHasilAdministrasi(Request $request)
    {
        foreach ($request->nilai as $idapply => $nilai) {
            Tahapan_apply::where('idapply', $idapply)
                ->where('idtahapan', 1) // 1 adalah ID untuk tahap seleksi administrasi
                ->update(['nilai' => $nilai]);
        }

        return redirect()->route('seleksi-administrasi')->with('success', 'Hasil seleksi administrasi berhasil disimpan.');
    }
}
