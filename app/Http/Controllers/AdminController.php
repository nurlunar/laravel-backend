<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    

    public function nasabah_show_admin()
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

    public function nasabah_detail_admin($id)
    {
    // perintah untuk menampilkan data dari tabel mitra
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
            'message' => 'nasabah tidak ditemukan',
        ], 200);
    }
}

    public function store_nasabah_admin(Request $request)
{
    // Ini berfungsi untuk menginput nilai dari front end
    // $variabel_nama_mitra    = $request->nama_mitra_frontend;
    // $alamat_mitra           = $request->alamat_mitra;
    $nama                   = $request->nama;
    $alamat                 = $request->alamat;
    $email                  = $request->email;
    $no_telepon             = $request->no_telepon;
    $username               = $request->username;
    $password               = $request->password;
    $foto                   = $request->foto;

    // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
    $hasil_simpan_nasabah = Nasabah::create([
        'nama'            =>  $request->nama,
        'alamat'          =>  $request->alamat,
        'email'           =>  $request->email,
        'no_telepon'      =>  $request->no_telepon,
        'username'        =>  $request->usernsme,
        'password'        =>  $request->password,
        'foto'            =>  $request->foto
        
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
    public function update_nasabah_admin(Request $request,$id)
    {
    //$id                     = $request->id;
    $nama                   = $request->nama;
    $alamat                 = $request->alamat;
    $email                  = $request->email;
    $no_telepon             = $request->no_telepon;
    $username               = $request->username;
    $password               = $request->password;
    $foto                   = $request->foto;

    // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
    $hasil_update_nasabah = Nasabah::where('id',$request-> id)
    -> update([

        //'id '             =>  $request->id,
        'nama'            =>  $request->nama,
        'alamat'          =>  $request->alamat,
        'email'           =>  $request->email,
        'no_telepon'      =>  $request->no_telepon,
        'username'        =>  $request->usernsme,
        'password'        =>  $request->password,
        'foto'            =>  $request->foto
        
    ]);

    // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
    if ($hasil_update_nasabah) {
        return response()->json([
            'success' => true,
            'message' => 'Data Nasabah Berhasil Diupdate!',
            'data'    => $hasil_update_nasabah
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data Nasabah Gagal Diupdate!',
        ], 200);
        }
    }

    public function delete_nasabah_admin($id)
    {
        
       $hasil_delete_nasabah=Nasabah:: find($id);
       $hasil_delete_nasabah->delete();
       
        if ($hasil_delete__nasabah -> delete()){
            return response()->json([
                'success' => true,
                'message' => 'Data Nasabah Berhasil Dihapus!',
                'data'    => $hasil_delete_nasabah
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Nasabah Gagal Dihapus!',
            ], 200);
        }
    }
}