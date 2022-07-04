<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
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

    

    public function role_nasabah_pesanan_show()
    {
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Pesanan::orderBy('created_at', 'desc')->get();
        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan pesanan Nasabah',
            'data' => $result,
        ], 200);
        
    }
    public function pesanan_show ($mitra_id){
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Pesanan::orderBy('created_at', 'desc')->get();
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
        //$pesanan = Pesanan::find(13);
        //$nasabah = Pesanan::find(13)->nasabah; 
        
        // Ini berfungsi untuk menginput nilai dari front end
        //$variabel_nama_mitra    = $request->nama_mitra_frontend;
        $nasabah_id                     = $request->nasabah_id;
        $nasabah                        = $request->nama;
        $nasabah                        = $request->alamat;
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
            'nasabah'               =>  $request->alamat,
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

