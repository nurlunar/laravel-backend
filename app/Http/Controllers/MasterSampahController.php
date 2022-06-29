<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasterSampah;

class MasterSampahController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function master_sampah_show_for_admin()
    {
        // ...
         // perintah untuk menampilkan data dari tabel nasabah 
         $result = MasterSampah::get();

         // perintah data yang akan di tampilkan
         return response()->json([
             'status' => true,
             'message' => 'Berhasil menampilkan data sampah',
             'data' => $result,
         ], 200);
    }

    public function master_sampah_detail_for_admin($id)
    {
        // ...
        // ...
        // perintah untuk menampilkan data dari tabel nasabah
        $result = MasterSampah::find($id);
      
        // perintah data yang akan di tampilkan
        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data sampah',
                'data' => $result,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Sampah tidak ditemukan',
            ], 200);
        }
    }

    public function master_sampah_update_for_admin(Request $request)
    {
        $id                     = $request->id;
        $kategori               = $request->harga;
        $harga                  = $request->harga;
        $foto                   = $request->foto;
    
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_sampah= MasterSampah::where('id', $request-> id)->update([
            'kategori'               =>  $request->kategori,
            'harga'                  =>  $request->harga,
            'foto'                   =>  $request->foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_sampah) {
            return response()->json([
                'success' => true,
                'message' => 'Data Sampah Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Sampah Gagal Diupdate!',
            ], 200);
        }
    }   
    

    public function master_sampah_store_for_admin(Request $request)
    {
        // ...
        // Ini berfungsi untuk menginput nilai dari front end
        //$variabel_nama_mitra    = $request->nama_mitra_frontend;
        $kategori                  = $request->kategori;
        $harga                     = $request->harga;
        $foto                      = $request->foto;
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_sampah = MasterSampah::create([
            'kategori'          =>  $kategori,
            'harga'             =>  $harga,
            'foto'              =>  $foto
           
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_sampah) {
            return response()->json([
                'success' => true,
                'message' => 'Data Sampah Berhasil Disimpan!',
                'data'    => $hasil_simpan_sampah
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Sampah Gagal Disimpan!',
            ], 200);
        }
    }

    

    public function master_sampah_delete_for_admin($id)
    {
        // ...
        $mastersampah = MasterSampah::find($id)->delete();
        
      if ($mastersampah){
           return response()->json([
               'success' => true,
               'message' => 'Data Sampah Berhasil Dihapus!',
                
           ], 200);
       } else {
           return response()->json([
                'success' => false,
                'message' => 'Data Sampah Gagal Dihapus!',
           ], 200);
       }
    }
    public function master_sampah_show_for_nasabah()
    {
        // ...
         // perintah untuk menampilkan data dari tabel nasabah 
         $result = MasterSampah::get();

         // perintah data yang akan di tampilkan
         return response()->json([
             'status' => true,
             'message' => 'Berhasil menampilkan data sampah',
             'data' => $result,
         ], 200);
    }

    public function master_sampah_show_for_mitra()
    {

    // ...
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = MasterSampah::get();

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan data sampah',
            'data' => $result,
        ], 200);
    }
}