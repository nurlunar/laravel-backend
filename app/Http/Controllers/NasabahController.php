<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function nasabah_show_for_admin()
    {
        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Nasabah::get();

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan data nasabah',
            'data' => $result,
        ], 200);
        
    }

    public function nasabah_detail_for_admin($id)
    {
      
        // ...
        // perintah untuk menampilkan data dari tabel nasabah
        $result = Nasabah::find($id);
      
        // perintah data yang akan di tampilkan
        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data nasabah',
                'data' => $result,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Nasabah tidak ditemukan',
            ], 200);
        }
    }

    public function nasabah_store_for_admin(Request $request)
    {
        // Ini berfungsi untuk menginput nilai dari front end
        //$variabel_nama_mitra    = $request->nama_mitra_frontend;
        $nama                   = $request->nama;
        $alamat                 = $request->alamat;
        $email                  = $request->email;
        $no_telepon             = $request->no_telepon;
        $username               = $request->username;
        $password               = $request->password;
        $foto                   = $request->foto;

        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_nasabah = Nasabah::create([
            'nama'          =>  $nama,
            'alamat'        =>  $alamat,
            'email'         =>  $email,
            'no_telepon'    =>  $no_telepon,
            'username'      =>  $username,
            'password'      =>  $password,
            'foto'          =>  $foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_nasabah) {
            return response()->json([
                'success' => true,
                'message' => 'Data Nasabah Berhasil Disimpan!',
                'data'    => $hasil_simpan_nasabah
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Nasabah Gagal Disimpan!',
            ], 200);
        }
    }

    public function update_nasabah_for_admin(Request $request)
    {
     
        $id                     = $request->id;
        $nama                   = $request->nama;
        $alamat                 = $request->alamat;
        $email                  = $request->email;
        $no_telepon             = $request->no_telepon;
        $username               = $request->username;
        $password               = $request->password;
        $foto                   = $request->foto;
    
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_nasabah= Nasabah::where('id', $request-> id)->update([
            'nama'            =>  $request->nama,
            'alamat'          =>  $request->alamat,
            'email'           =>  $request->email,
            'no_telepon'      =>  $request->no_telepon,
            'username'        =>  $request->username,
            'password'        =>  $request->password,
            'foto'            =>  $request->foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_nasabah) {
            return response()->json([
                'success' => true,
                'message' => 'Data Nasabah Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Nasabah Gagal Diupdate!',
            ], 200);
        }
    }   
    public function delete_nasabah_for_admin($id)
     {
        // ...
        $nasabah = Nasabah::find($id)->delete();
        
        if ($nasabah){
             return response()->json([
                 'success' => true,
                 'message' => 'Data Nasabah Berhasil Dihapus!',
                
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'Data Nasabah Gagal Dihapus!',
             ], 200);
       }
    }










    public function nasabah_show_for_mitra(Request $request)
    {

        // perintah untuk menampilkan data dari tabel nasabah 
        $result = Nasabah::get();

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan data nasabah',
            'data' => $result,
        ], 200);
        
    }      
        
 

 public function nasabah_show($id)

    {
      
        // perintah untuk menampilkan data dari tabel nasabah
        $result = Nasabah::find($id);
      
        // perintah data yang akan di tampilkan
        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data nasabah',
                'data' => $result,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Nasabah tidak ditemukan',
            ], 200);
        }
    }
    
    public function update_nasabah(Request $request)
    {
     
        $id                     = $request->id;
        $nama                   = $request->nama;
        $alamat                 = $request->alamat;
        $email                  = $request->email;
        $no_telepon             = $request->no_telepon;
        $username               = $request->username;
        $password               = $request->password;
        $foto                   = $request->foto;
    
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_nasabah= Nasabah::where('id', $request-> id)->update([
            'nama'            =>  $request->nama,
            'alamat'          =>  $request->alamat,
            'email'           =>  $request->email,
            'no_telepon'      =>  $request->no_telepon,
            'username'        =>  $request->username,
            'password'        =>  $request->password,
            'foto'            =>  $request->foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_nasabah) {
            return response()->json([
                'success' => true,
                'message' => 'Data Nasabah Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Nasabah Gagal Diupdate!',
            ], 200);
        }
    } 
}  

 

 
     
        
