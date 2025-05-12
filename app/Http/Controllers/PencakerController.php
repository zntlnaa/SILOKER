<?php

namespace App\Http\Controllers;
use App\Models\Pencaker;
use App\Models\Loker;
use App\Models\Tahapan_apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PencakerController extends Controller
{
    //Menampilkan Daftar Pencaker yang Apply di Loker Tertentu
    public function getPencaker($idloker)
    {
        // Ambil data pencaker yang apply di loker dengan ID tertentu
        $data = DB::table('pencaker')
            ->join('apply_loker', 'pencaker.noktp', '=', 'apply_loker.noktp')
            ->join('tahapan_apply', 'apply_loker.idapply', '=', 'tahapan_apply.idapply')
            ->join('tahapan', 'tahapan_apply.idtahapan', '=', 'tahapan.idtahapan')
            ->select('apply_loker.idapply as id_apply', 'pencaker.nama', 'tahapan.nama as tahapan', 'tahapan_apply.nilai as nilai')
            ->where('apply_loker.idloker', $idloker)
            ->paginate(5);

        // Kirim data ke view untuk ditampilkan
        $namaLoker = Loker::where('idloker', $idloker)->value('nama');
        return view('listPencakerApply', ['data' => $data, 'namaLoker' => $namaLoker, 'idloker'=>$idloker]);
    }
    //Menampilkan detail pencaker
    public function detailPencaker($idapply)
    {
        // Ambil data pencaker berdasarkan ID Apply
        $data = DB::table('pencaker')
            ->join('apply_loker', 'pencaker.noktp', '=', 'apply_loker.noktp')
            ->select('pencaker.*')
            ->where('apply_loker.idapply', $idapply)
            ->first(); // Mengambil hanya satu hasil
    
        return view('detailPencaker', ['data' => $data]);
    }

    public function seleksiAdministrasi($idloker)
    {
        // Dapatkan data pencaker yang telah mendaftar untuk loker ini
        $data = Pencaker::join('apply_loker', 'pencaker.noktp', '=', 'apply_loker.noktp')
            ->join('tahapan_apply', 'apply_loker.idapply', '=', 'tahapan_apply.idapply')
            ->join('tahapan', 'tahapan_apply.idtahapan', '=', 'tahapan.idtahapan')
            ->select('apply_loker.idapply as id_apply', 'pencaker.nama', 'apply_loker.idloker', 'tahapan.nama as nama_tahapan','tahapan_apply.nilai as nilai')
            ->where('apply_loker.idloker', $idloker)
            ->where('tahapan.nama', 'Seleksi Administrasi')
            ->orderBy('tahapan_apply.idapply', 'asc')
            ->paginate(5);

        // Kirim data ke view untuk ditampilkan
        $namaLoker = Loker::where('idloker', $idloker)->value('nama');
        return view('seleksiAdministrasi', ['data' => $data, 'namaLoker' => $namaLoker]);
    }

    public function lulusSeleksiAdministrasi(Request $request, $idloker)
    {
        $idapply = $request->input('id_apply');
        $nilai = $request->input('nilai');
        
        // Pastikan Anda validasi input sesuai kebutuhan, seperti memastikan nilai hanya 0 atau 1.

        $tahapan_apply = Tahapan_apply::where('idapply', $idapply)
            ->where('idtahapan', 1)
            ->first();

        if ($tahapan_apply) {
            $tahapan_apply->update(['nilai' => $nilai]);
            // Jika calon lulus, ubah idtahapan menjadi 2
            if ($nilai == 1) {
                $tahapan_apply->update(['idtahapan' => 2]);
            }  
        } else {
            Tahapan_apply::create([
                'idapply' => $idapply,
                'idtahapan' => ($nilai == 1) ? 2 : 1,
                'nilai' => $nilai
            ]);
        }

        return redirect()->route('seleksi-administrasi', ['idloker' => $idloker])->with('success', 'Calon berhasil ditandai Lulus.');
    }

    public function tidakLulusSeleksiAdministrasi(Request $request, $idloker)
    {
        $idapply = $request->input('id_apply');
        $nilai = $request->input('nilai');
        
        // Pastikan Anda validasi input sesuai kebutuhan, seperti memastikan nilai hanya 0 atau 1.

        $tahapan_apply = Tahapan_apply::where('idapply', $idapply)
            ->where('idtahapan', 1)
            ->first();

        if ($tahapan_apply) {
            $tahapan_apply->update(['nilai' => $nilai]);
        } else {
            Tahapan_apply::create([
                'idapply' => $idapply,
                'idtahapan' => 1,
                'nilai' => $nilai
            ]);
        }

        return redirect()->route('seleksi-administrasi', ['idloker' => $idloker])->with('success', 'Calon berhasil ditandai Tidak Lulus.');
    }
  
    public function seleksiWawancara($idloker)
    {
        // Dapatkan data pencaker lulus seleksi administrasi untuk loker ini
        $data = Pencaker::join('apply_loker', 'pencaker.noktp', '=', 'apply_loker.noktp')
            ->join('tahapan_apply', 'apply_loker.idapply', '=', 'tahapan_apply.idapply')
            ->join('tahapan', 'tahapan_apply.idtahapan', '=', 'tahapan.idtahapan')
            ->select('apply_loker.idapply as id_apply', 'pencaker.nama', 'apply_loker.idloker', 'tahapan.nama as nama_tahapan','tahapan_apply.nilai as nilai')
            ->where('apply_loker.idloker', $idloker)
            ->where('tahapan.nama', 'Seleksi Wawancara')
            ->orderBy('tahapan_apply.idapply', 'asc')
            ->paginate(5);

        // Kirim data ke view untuk ditampilkan
        $namaLoker = Loker::where('idloker', $idloker)->value('nama');
        return view('seleksiWawancara', ['data' => $data, 'namaLoker' => $namaLoker, 'idloker' => $idloker]);
    }
    public function lulusSeleksiWawancara($idapply)
    {
        
        // Cek apakah data sudah ada berdasarkan idapply dan idtahapan
        $tahapan_apply = Tahapan_apply::where ('idapply', $idapply)
            ->where('idtahapan', 2)
            ->first();

        if($tahapan_apply){
            //Jika data sudah ada, update nilai saja
            $tahapan_apply->update(['nilai'=>1]);
        }else{
            tahapan_apply::create([
                'idapply' => $idapply,
                'idtahapan' => 2, // ID tahapan Wawancara
                'nilai' => 1
            ]);
        }
        return redirect()->route('seleksiWawancara')->with('success', 'Calon berhasil ditandai sebagai Lulus.');
    }

    public function tidaklulusSeleksiWawancara($idapply)
    {
        // Cek apakah data sudah ada berdasarkan ID Apply dan ID Tahapan
        $tahapan_apply = Tahapan_apply::where('idapply', $idapply)
            ->where('idtahapan', 2); // ID tahapan Wawancara

        if ($tahapan_apply) {
            // Jika data sudah ada, lakukan pembaruan nilai
            $tahapan_apply->update([
                'nilai' => 0
            ]);
        } else {
            // Jika data belum ada, tambahkan data baru
            tahapan_apply::create([
                'idapply' => $idapply,
                'idtahapan' => 2, // ID tahapan Wawancara
                'nilai' => 0
            ]);
        }

        return redirect()->route('seleksiWawancara')->with('success', 'Calon  berhasil ditandai sebagai Tidak Lulus.');
    }

    public function batalLulusAdministrasi(Request $request, $idloker)
    {
        $idapply = $request->input('id_apply');
    
        // Periksa apakah pencaker telah lulus seleksi wawancara
        $tahapan_apply = Tahapan_apply::where('idapply', $idapply)
            ->where('idtahapan', 2) // ID tahapan seleksi wawancara
            ->first();
    
        if ($tahapan_apply) {
            // Pindahkan pencaker ke tabel seleksi administrasi dengan ID tahapannya menjadi 1
            $tahapan_apply->update(['idtahapan' => 1]);    
            return redirect()->route('seleksi-wawancara', ['idloker' => $idloker])->with('success', 'Keputusan seleksi wawancara dibatalkan.');
        } else {
            return redirect()->route('seleksi-wawancara', ['idloker' => $idloker])->with('error', 'Pencaker belum dianggap lulus seleksi wawancara.');
        }
    }
    

}