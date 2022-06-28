<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function mitra_show_for_admin()
    {
      // perintah untuk menampilkan data dari tabel nasabah 
      $result = Mitra::get();

      
      // perintah data yang akan di tampilkan
      return response()->json([
          'status' => true,
          'message' => 'Berhasil menampilkan data nasabah',
          'data' => $result,
      ], 200);
       
      
       
    }

    public function mitra_detail_for_admin($id)
    {
        // perintah untuk menampilkan data dari tabel mitra
        $result = Mitra::find($id);
      
        // perintah data yang akan di tampilkan
        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data mitra',
                'data' => $result,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Mitra tidak ditemukan',
            ], 200);
        }
    }

    public function mitra_store_for_admin(Request $request)
    {
        // Ini berfungsi untuk menginput nilai dari front end
        //$variabel_nama_mitra    = $request->nama_mitra_frontend;
        $nama_mitra             = $request->nama_mitra;
        $alamat_mitra           = $request->alamat_mitra;
        $no_telepon             = $request->no_telepon;
        $email                  = $request->email;
        $username               = $request->username;
        $password               = $request->password;
        $foto                   = $request->foto;

        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_mitra = Mitra::create([
            'nama_mitra'    =>  $nama_mitra,
            'alamat_mitra'  =>  $alamat_mitra ,
            'no_telepon'    =>  $no_telepon,
            'email'         =>  $email,
            'username'      =>  $username,
            'password'      =>  $password,
            'foto'          =>  $foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_mitra) {
            return response()->json([
                'success' => true,
                'message' => 'Data Mitra Berhasil Disimpan!',
                'data'    => $hasil_simpan_mitra
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Mitra Gagal Disimpan!',
            ], 200);
        }
    }

    public function mitra_update_for_admin(Request $request)
    {
        $id                     = $request->id;
        $nama_mitra             = $request->nama_mitra;
        $alamat_mitra           = $request->alamat_mitra;
        $no_telepon             = $request->no_telepon;
        $email                  = $request->email;
        $username               = $request->username;
        $password               = $request->password;
        $foto                   = $request->foto;
    
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_mitra = Mitra::where('id', $request-> id)->update([
            'nama_mitra'      =>  $request->nama_mitra,
            'alamat_mitra'    =>  $request->alamat_mitra,
            'no_telepon'      =>  $request->no_telepon,
            'email'           =>  $request->email,
            'username'        =>  $request->usernsme,
            'password'        =>  $request->password,
            'foto'            =>  $request->foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_mitra) {
            return response()->json([
                'success' => true,
                'message' => 'Data Mitra Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Mitra Gagal Diupdate!',
            ], 200);
        }
    }
    
    public function mitra_delete_for_admin($id)
    {
        // ...
        $mitra = Mitra::find($id)->delete();
        
        if ($mitra){
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


    

public function mitra_show_for_nasabah(Request $request)
{
        $result = Mitra::get();

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan data mitra',
            'data' => $result,
        ], 200);
    }

    
   

    



public function mitra_show($id)
  {
       // perintah untuk menampilkan data dari tabel mitra
        $result = Mitra::find($id);
      
        // perintah data yang akan di tampilkan
        if ($result != null) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data mitra',
                'data' => $result,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Mitra tidak ditemukan',
            ], 200);
        }
    }

    

    public function update_mitra(Request $request)
    {

        $id                           = $request->id;
        $nama_mitra                   = $request->nama_mitra;
        $alamat_mitra                 = $request->alamat_mitra;
        $no_telepon                   = $request->no_telepon;
        $email                        = $request->email;
        $username                     = $request->username;
        $password                     = $request->password;
        $foto                         = $request->foto;

        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_mitra= Mitra::where('id', $request-> id)->update([
            'nama_mitra'           =>  $request->nama_mitra,
            'alamat_mitra'         =>  $request->alamat_mitra,
            'no_telepon'           =>  $request->no_telepon,
            'email'                =>  $request->email,
            'username'             =>  $request->username,
            'password'             =>  $request->password,
            'foto'                 =>  $request->foto
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_mitra) {
            return response()->json([
                'success' => true,
                'message' => 'Data mitra Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data mitra Gagal Diupdate!',
            ], 200);
        }
    }
}