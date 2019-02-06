<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Assignment3 extends Controller
{
    public function index() {
        return view('assignment3');
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone= $request->input('phone');
        $linkedin = $request->input('linkedin_profile');
        $address = $request->input('address');

        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $pass = env('APP_KEY');

        $user_data = [
            "name" => openssl_encrypt($name, $cipher, $pass, 0, $iv),
            "email" => openssl_encrypt($email, $cipher, $pass, 0, $iv),
            "phone" => openssl_encrypt($phone, $cipher, $pass, 0, $iv),
            "linkedin_profile" => openssl_encrypt($linkedin, $cipher, $pass, 0, $iv),
            "address" => openssl_encrypt($address, $cipher, $pass, 0, $iv)
        ];

        DB::table('user_info')->insert($user_data);

        $decrypted = [
            "name" => openssl_decrypt($user_data["name"], $cipher, $pass, 0, $iv),
            "email" => openssl_decrypt($user_data["email"], $cipher, $pass, 0, $iv),
            "phone" => openssl_decrypt($user_data["phone"], $cipher, $pass, 0, $iv),
            "linkedin_profile" => openssl_decrypt($user_data["linkedin_profile"], $cipher, $pass, 0, $iv),
            "address" => openssl_decrypt($user_data["address"], $cipher, $pass, 0, $iv)
        ];

        return view('submited_user_info')
            ->with('decrypted', $decrypted);
    }
}
