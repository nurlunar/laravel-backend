<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Saldo;
use App\Models\Pesanan;

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

    public function pesanan_show(Request $request)
    {
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Pesanan::find($request->nasabah_id);

        // perintah data yang akan di tampilkan

        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan detail pesanan',
                'data' => $result,
            ], 200);
        } else {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan pesanan Nasabah',
            'data' => $result,
        ], 200);
        
    }
}
    public function pesanan_nasabah_show($id)

    {
      
        // perintah untuk menampilkan data dari tabel nasabah
        $result = Pesanan::find($id);
      
        // perintah data yang akan di tampilkan
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
     
        $nasabah_id                     = $request->nasabah_id;
        $mitra_id                       = $request->mitra_id;
        $kategori                       = $request->kategori;
        $berat                          = $request->berat;
        $harga                          = $request->harga;
        $total                          = $request->total;
        $diterima                       = $request->diterima;
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_pesanan = Pesanan::where('id', $request-> id)->update([
            'nasabah_id'            =>  $request->nasabah_id,
            'mitra_id'              =>  $request->mitra_id,
            'kategori'              =>  $request->kategori,
            'berat'                 =>  $request->berat,
            'harga'                 =>  $request->harga,
            'total'                 =>  $request->total,
            'diterima'              =>  $request->diterima
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
    public function pesanan_nasabah_store(Request $request)
    {
        // Ini berfungsi untuk menginput nilai dari front end
        //$variabel_nama_mitra    = $request->nama_mitra_frontend;
        $nasabah_id                     = $request->nasabah_id;
        $mitra_id                       = $request->mitra_id;
        $kategori                       = $request->kategori;
        $berat                          = $request->berat;
        $harga                          = $request->harga;
        $total                          = $request->total;
        $diterima                       = $request->diterima;

        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_pesanan= Pesanan::create([
            'nasabah_id'            =>  $request->nasabah_id,
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
}  
