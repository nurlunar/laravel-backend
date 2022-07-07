<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Saldo;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function saldo_mitra_show_for_admin($mitra_id)
    {
        // List & Total
        // perintah untuk menampilkan data dari tabel nasabah 
        $saldoList = Saldo::where('mitra_id', $mitra_id)->get();

        $total = 0;

        foreach ($saldoList as $key => $value) {
            $total = $total + (($value->pemasukan ?? 0) - ($value->pengeluaran ?? 0));
        }

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan saldo',
            'data' => $saldoList,
            'total' => $total
        ], 200);
    }

    public function saldo_mitra_store_for_admin(Request $request)
    {
        $nasabah_id                 = $request->nasabah_id;
        $mitra_id                   = $request->mitra_id;
        $pemasukan                  = $request->pemasukan;
        $pengeluaran                = $request->pengeluaran;
        $keterangan                 = $request->keterangan;
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_saldo = Saldo::create([
            'nasabah_id' =>$nasabah_id,
            'mitra_id'   =>$mitra_id,
            'pemasukan'  =>$pemasukan,
            'pengeluaran'=>$pengeluaran,
            'keterangan' =>$keterangan
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_saldo) {
            return response()->json([
                'success' => true,
                'message' => 'Data Saldo Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Saldo Gagal Disimpan!',
            ], 200);
        }
    }
    

    public function saldo_mitra_update_for_admin(Request $request)
    {
        // ...
        $id                         = $request->id;
        $nasabah_id                 = $request->nasabah_id;
        $mitra_id                   = $request->mitra_id;
        $pemasukan                  = $request->pemasukan;
        $pengeluaran                = $request->pengeluaran;
        $keterangan                 = $request->keterangan;
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::update
        $hasil_update_saldo= Saldo::where('id', $request-> id)->update([

            'nasabah_id' =>$nasabah_id,
            'mitra_id'   =>$mitra_id,
            'pemasukan'  =>$pemasukan,
            'pengeluaran'=>$pengeluaran,
            'keterangan' =>$keterangan
            
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_update_saldo) {
            return response()->json([
                'success' => true,
                'message' => 'Data Saldo Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Saldo Gagal Diupdate!',
            ], 200);
        }
    }  










    public function saldo_nasabah_store_for_mitra(Request $request){
        $nasabah_id                 = $request->nasabah_id;
        $mitra_id                   = $request->mitra_id;
        $pemasukan                  = $request->pemasukan;
        $pengeluaran                = $request->pengeluaran;
        $keterangan                 = $request->keterangan;
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_saldo = Saldo::create([
            'nasabah_id' =>$nasabah_id,
            'mitra_id'   =>$mitra_id,
            'pemasukan'  =>$pemasukan,
            'pengeluaran'=>$pengeluaran,
            'keterangan' =>$keterangan
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_saldo) {
            return response()->json([
                'success' => true,
                'message' => 'Data Saldo Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Saldo Gagal Disimpan!',
            ], 200);


        }
     }


     public function saldo_nasabah_show($nasabah_id)
     {

        // List & Total
        // perintah untuk menampilkan data dari tabel nasabah 
        $saldoList = Saldo::where('nasabah_id', $nasabah_id)->get();

        $total = 0;

        foreach ($saldoList as $key => $value) {
            $total = $total + (($value->pemasukan ?? 0) - ($value->pengeluaran ?? 0));
        }

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan saldo',
            'data' => $saldoList,
            'total' => $total
        ], 200);
    

     }

}
