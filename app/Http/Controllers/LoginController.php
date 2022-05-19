<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Mitra;
use App\Models\Nasabah;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function login_admin(Request $request)
    {
        // Menerima value dengan nama username dan password dari FrondEnd
        $username = $request->username;
        $password = $request->password;

        // Query Eloquent untuk filter data username dan password.
        // Hasilnya adalah array collection, lalu ditampung ke variabel result
        $result = Admin::where('username', $username)
                        ->where('password', $password)
                        ->get();
      
        // Jika resultnya lebih dari 0 maka berhasil login TRUE,
        // else gagal login FALSE
        if (count($result) > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil login',
                'data' => $result->first(),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Username atau password salah',
            ], 200);
        }   
    }

    public function login_mitra(Request $request)
    {
        // Menerima value dengan nama username dan password dari FrondEnd
        $username = $request->username;
        $password = $request->password;

        // Query Eloquent untuk filter data username dan password.
        // Hasilnya adalah array collection, lalu ditampung ke variabel result
        $result = Mitra::where('username', $username)
                        ->where('password', $password)
                        ->get();
      
        // Jika resultnya lebih dari 0 maka berhasil login TRUE,
        // else gagal login FALSE
        if (count($result) > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil login',
                'data' => $result->first(),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Username atau password salah',
            ], 200); 
    }
  }
     public function login_nasabah(Request $request)
    {
    // Menerima value dengan nama username dan password dari FrondEnd
    $username = $request->username;
    $password = $request->password;

    // Query Eloquent untuk filter data username dan password.
    // Hasilnya adalah array collection, lalu ditampung ke variabel result
    $result = Nasabah::where('username', $username)
                ->where('password', $password)
                ->get();

    // Jika resultnya lebih dari 0 maka berhasil login TRUE,
    // else gagal login FALSE
    if (count($result) > 0) {
        return response()->json([
        'status' => true,
        'message' => 'Berhasil login',
        'data' => $result->first(),
        ], 200);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Username atau password salah',
        ], 200); 
        
        }

    }   
    
}

