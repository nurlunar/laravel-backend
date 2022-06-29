<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\Saldo;
use App\Models\Pesanan;
use App\Models\Reward;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function update_status_pesanan_for_mitra(Request $request){
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent pesanan::update
        $hasil_update_pesanan= Pesanan::where('id', $request->id)->update([
            'diterima'   =>  1
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_pesanan) {
            $pesananFind = Pesanan::find($request->id);
            $poinWithComma = $pesananFind->total / 10000;
            $poinWithoutComma = number_format($poinWithComma, 2, '.', '');

            Reward::create([
                'nasabah_id'    =>  $pesananFind->nasabah_id,
                'jumlah_point'  =>  $poinWithoutComma
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data pesanan Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data pesanan Gagal Diupdate!',
            ], 200);
        }
    }

    public function role_admin_beranda() {
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Pesanan::where('diterima', 1)->get();

        $berat = 0;
        $pendapatan = 0;

        foreach ($result as $key => $value) {
            $berat = $berat + ($value->berat ?? 0);
            $pendapatan = $pendapatan + ($value->total ?? 0);
        }

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan pesanan Nasabah',
            'total_berat' => $berat,
            'total_pendapatan' => $pendapatan
        ], 200);
    }


    public function pesanan_show($mitra_id) {
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Pesanan::with('nasabah_belongs_to')
                            ->where('mitra_id', $mitra_id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan pesanan Nasabah',
            'data' => $result,
        ], 200);
    }

    public function role_nasabah_pesanan_show(Request $request) {
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Pesanan::where('nasabah_id', $request->nasabah_id)->orderBy('created_at', 'desc')->get();

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan pesanan Nasabah',
            'data' => $result,
        ], 200);
    }

    public function pesanan_nasabah_show($id)
      {
        //perintah untuk menampilkan data dari tabel nasabah
        $result = Pesanan::find($id);
        //$nasabah = Pesanan::find(13)->nasabah;
      
        //perintah data yang akan di tampilkan
        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan detail pesanan',
                'data' => $result,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pesanan tidak ditemukan',
            ], 200);
        }
    }

public function update_pesanan_nasabah(Request $request)
    {
     
        // $nasabah_id                     = $request->nasabah_id;
        // $mitra_id                       = $request->mitra_id;
        // $kategori                       = $request->kategori;
        $berat                          = $request->berat;
        $harga                          = $request->harga;
        $total                          = $request->total;
        // $diterima                       = $request->diterima;
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_pesanan = Pesanan::where('id', $request-> id)->update([
            // 'nasabah_id'            =>  $request->nasabah_id,
            // 'mitra_id'              =>  $request->mitra_id,
            // 'kategori'              =>  $request->kategori,
            'berat'                 =>  $request->berat,
            'harga'                 =>  $request->harga,
            'total'                 =>  $request->total,
            // 'diterima'              =>  $request->diterima
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_pesanan) {
            return response()->json([
                'success' => true,
                'message' => 'Pesanan Nasabah Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan Nasabah Gagal Diupdate!',
            ], 200);
        }
    }

    public function pesanan_nasabah_store (Request $request)
    {       
        // Ini berfungsi untuk menginput nilai dari front end
        //$variabel_nama_mitra    = $request->nama_mitra_frontend;
        $nasabah_id                     = $request->nasabah_id;
        $nasabah                        = $request->nama;
        $mitra_id                       = $request->mitra_id;
        $kategori                       = $request->kategori;
        $berat                          = $request->berat;
        $harga                          = $request->harga;
        $total                          = $request->total;
        $diterima                       = $request->diterima;

        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_pesanan= Pesanan::create([
            'nasabah_id'            =>  $request->nasabah_id,
            'nasabah'               =>  $request->nama,
            'mitra_id'              =>  $request->mitra_id,
            'kategori'              =>  $request->kategori,
            'berat'                 =>  $request->berat,
            'harga'                 =>  $request->harga,
            'total'                 =>  $request->total,
            'diterima'              =>  $request->diterima
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_pesanan) {
            return response()->json([
                'success' => true,
                'message' => 'Pesanan Nasabah Berhasil Disimpan!',
                'data'    => $hasil_simpan_pesanan
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan Nasabah Gagal Disimpan!',
            ], 200);
        }
    }
    public function delete_pesanan($id)
    {
        // ...
        $pesanan = Pesanan::find($id)->delete();
        
      if ($pesanan){
           return response()->json([
               'success' => true,
               'message' => 'Pesanan Berhasil Dihapus!',
                
           ], 200);
       } else {
           return response()->json([
                'success' => false,
                'message' => 'Pesanan Gagal Dihapus!',
           ], 200);
       }
    }
}

