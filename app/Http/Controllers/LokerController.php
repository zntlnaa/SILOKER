<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Tahapan_apply;
use App\Models\Pencaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokerController extends Controller
{
    // Menampilkan daftar Lowongan Kerja secara umum.
    public function indexDataLoker(Request $request){
        if ($request->has('search')) {
            $data = Loker::where('idloker', 'like', '%' . $request->search . '%')
                ->orWhere('nama', 'like', '%' . $request->search . '%')
                ->orderBy('idloker', 'asc') 
                ->paginate(100);
        } else {
            $data = Loker::orderBy('idloker', 'asc')
                ->paginate(100);
        }
        return view('dataLoker', compact('data'));
    }    
    
    // Menampilkan daftar Lowongan Kerja berdasarkan filter status yang dipilih oleh pengguna.
    public function indexDaftarLoker(Request $request){
        // Mengambil nilai kategori status dari request
        $statusFilter = $request->input('status');
    
        // Menyaring data berdasarkan kategori status jika bukan "Semua Status"
        $query = Loker::query();
        if (!empty($statusFilter) && $statusFilter !== "Semua Status") {
            $query->where('status', $statusFilter);
        }
    
        // Menambahkan perintah orderBy untuk mengurutkan berdasarkan kolom 'status'
        $query->orderBy('status');
    
        // Menyusun data yang telah disaring dan memakai paginate
        $data = $query->paginate(100);
    
        // Mengirim data ke tampilan
        return view('daftarLoker', compact('data', 'statusFilter'));
    }
  
    
    public function showLoker(){
        $totalLoker = loker::count();
        $totalPelamar = pencaker::count();
        $jumlahPerusahaan = DB::table('loker')->pluck('idperusahaan')->unique()->count();
        //dd($totalLoker);
        return view('dashboard', compact('totalLoker', 'totalPelamar','jumlahPerusahaan'));
        }


    // Menampilkan formulir untuk mengedit data Lowongan Kerja.
    public function editLoker($idloker)
    {
        $data = Loker::where('idloker', $idloker)->first();
        //dd($data);
        return view('editLoker', compact('data'));
    }

    // Memproses pembaruan data Lowongan Kerja berdasarkan ID yang dipilih.
    public function updateLoker(Request $request, $idloker){
        $data = Loker::where('idloker', $idloker)->first();
    
        if ($data) {
            $updateData = [];
        
            if ($request->has('idloker')) {
                $updateData['idloker'] = $request->input('idloker');
            }
            if ($request->has('idperusahaan')) {
                $updateData['idperusahaan'] = $request->input('idperusahaan');
            }
            if ($request->has('nama')) {
                $updateData['nama'] = $request->input('nama');
            }
            if ($request->has('tipe')) {
                $updateData['tipe'] = $request->input('tipe');
            }
            if ($request->has('usia_min')) {
                $updateData['usia_min'] = $request->input('usia_min');
            }
            if ($request->has('usia_max')) {
                $updateData['usia_max'] = $request->input('usia_max');
            }
            if ($request->has('gaji_min')) {
                $updateData['gaji_min'] = $request->input('gaji_min');
            }
            if ($request->has('gaji_max')) {
                $updateData['gaji_max'] = $request->input('gaji_max');
            }
            if ($request->has('gaji_max')) {
                $updateData['gaji_max'] = $request->input('gaji_max');
            }
            if ($request->has('nama_cp')) {
                $updateData['nama_cp'] = $request->input('nama_cp');
            }
            if ($request->has('email_cp')) {
                $updateData['email_cp'] = $request->input('email_cp');
            }
            if ($request->has('no_telp_cp')) {
                $updateData['no_telp_cp'] = $request->input('no_telp_cp');
            }
            if ($request->has('tgl_update')) {
                $updateData['tgl_update'] = $request->input('tgl_update');
            }
            if ($request->has('tgl_aktif')) {
                $updateData['tgl_aktif'] = $request->input('tgl_aktif');
            }
            if ($request->has('tgl_tutup')) {
                $updateData['tgl_tutup'] = $request->input('tgl_tutup');
            }
            if ($request->has('status')) {
                $updateData['status'] = $request->input('status');
            }
            $data->update($updateData);
        
            return redirect()->route('dataLoker')->with('success', 'Data Loker berhasil diupdate'); 
        }
    }

    // Menampilkan konfirmasi sebelum menghapus data Lowongan Kerja.
    public function confirmdelete($idloker)
    {
        $data = Loker::where('idloker', $idloker)->first();

        if (!$data) {
            return redirect()->route('dataLoker')->with('error', 'Data Lowongan Kerja tidak ditemukan.');
        }

        return view('confirmDeleteLoker', compact('data'));
    }

    // Menghapus data Lowongan Kerja berdasarkan ID yang dipilih.
    public function deleteLoker($idloker)
    {
        $data = Loker::where('idloker', $idloker)->first();
        $data->delete();
        return redirect()->route('dataLoker')->with('success', 'Data Lowongan Kerja berhasil dihapus');
    }

    // Menampilkan halaman tambah Lowongan Kerja.
    public function addLoker()
    {
        return view('addLoker');
    }

    // Menyimpan data Lowongan Kerja yang baru ditambahkan ke database.
    public function insertLoker(Request $request)
    {
        // Validasi data yang diterima dari permintaan
        $validatedData = $request->validate([
            'idloker'=> 'required',
            'idperusahaan'=> 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'usia_min' => 'required',
            'usia_max' => 'required',
            'gaji_min' => 'required',
            'gaji_max' => 'required',
            'nama_cp' => 'required',
            'email_cp' => 'required',
            'no_telp_cp' => 'required',
            'tgl_update' => 'required',
            'tgl_aktif' => 'required',
            'tgl_tutup' => 'required',
            'status' => 'required',
        ]);

        // Simpan data Lowongan Kerja ke database
        Loker::create([
            'idloker'=> $validatedData['idloker'],
            'idperusahaan'=> $validatedData['idperusahaan'],
            'nama' => $validatedData['nama'],
            'tipe' => $validatedData['tipe'],
            'usia_min' => $validatedData['usia_min'],
            'usia_max' => $validatedData['usia_max'],
            'gaji_min' => $validatedData['gaji_min'],
            'gaji_max' => $validatedData['gaji_max'],
            'nama_cp' => $validatedData['nama_cp'],
            'email_cp' => $validatedData['email_cp'],
            'no_telp_cp' => $validatedData['no_telp_cp'],
            'tgl_update' => $validatedData['tgl_update'],
            'tgl_aktif' => $validatedData['tgl_aktif'],
            'tgl_tutup' => $validatedData['tgl_tutup'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('dataLoker')->with('success', 'Data Loker berhasil ditambahkan');
    }
    // Menampilkan halaman detail loker
    public function detailLoker($idloker)
    {
        $data = Loker::where('idloker', $idloker)->first();
       $hitungLoker = DB::table('pencaker')
    ->join('apply_loker', 'pencaker.noktp', '=', 'apply_loker.noktp')
    ->join('tahapan_apply', 'apply_loker.idapply', '=', 'tahapan_apply.idapply')
    ->join('tahapan', 'tahapan_apply.idtahapan', '=', 'tahapan.idtahapan')
    ->where('apply_loker.idloker', $idloker)
    ->count();
        return view('detailLoker', compact('data', 'hitungLoker'));

    }
    
    public function updateStatus($idloker)
    {
        // Temukan loker berdasarkan ID
        $loker = Loker::where('idloker', $idloker)->first();;
    
        if ($loker) {
            // Ubah tgl_tutup menjadi tanggal saat ini
            $loker->tgl_tutup = now();
            $loker->status = 'Tutup';
            $loker->save();
        }
        // Redirect kembali ke halaman detailLoker dengan pesan sukses
        return redirect()->route('detail-loker', ['idloker' => $loker->idloker])->with('success', 'Status loker berhasil diubah.');
    }
    

}

