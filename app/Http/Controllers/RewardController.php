<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reward;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */


    public function reward_nasabah_store_for_mitra(Request $request){
        $nasabah_id                 = $request->nasabah_id;
        $jumlah_point               = $request->jumlah_point;
        
        
        // Ini berfungsi untuk menyimpan data hasil dari Eloquent Mitra::create
        $hasil_simpan_point = Reward::create([
            'nasabah_id' =>$nasabah_id,
            'jumlah_point'   =>$jumlah_point
            
        ]);

        // Ini berfungsi untuk menampilkan hasil bahwa data berhasil di simpan 
        if ($hasil_simpan_point) {
            return response()->json([
                'success' => true,
                'message' => 'Point Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Point Gagal Disimpan!',
            ], 200);


        }
     }

    public function reward_nasabah_show($nasabah_id)
    {
        // List & Total
        // perintah untuk menampilkan data dari tabel nasabah 
        $pointList = Reward::where('nasabah_id', $nasabah_id)->get();

        $total = 0;

        foreach ($pointList as $key => $value) {
            $total = $total + ($value->jumlah_point ?? 0);
        }

        // perintah data yang akan di tampilkan
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan Point',
            'data' => $pointList,
            'total' => $total
        ], 200);
    }
       
}
    
