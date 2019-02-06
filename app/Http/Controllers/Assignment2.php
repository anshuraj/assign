<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Assignment2 extends Controller
{
    public function __construct() {
        $this->csrf = random_int(0, PHP_INT_MAX);
    }

    public function index()
    {
        return view('assignment2')
            ->with([
                'clientId'=> env('LINKEDIN_CLIENT_ID'),
                'redirectUri'=> env('LINKEDIN_REDIRECT_URI'),
                "csrfToken"=> $this->csrf
            ]);
    }

    public function callback(Request $request)
    {
        $error = $request->input('error');
        $errDescription = $request->input('error_description');
        $state = $request->input('state');

        // Checking if there's any error with login
        if ($state !== $this->csrf && !$error && !$errDescription) {
            $code = $request->input('code');

            $post_data =
                "grant_type=authorization_code" .
                "&code=$code" .
                "&redirect_uri=" . urlencode(env('LINKEDIN_REDIRECT_URI')) .
                "&client_id=" . env('LINKEDIN_CLIENT_ID') .
                "&client_secret=" . env('LINKEDIN_CLIENT_SECRET');


            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, "https://www.linkedin.com/oauth/v2/accessToken");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($curl);
            curl_close($curl);

            $result = json_decode($result);

            if (!isset($result->error)) {
                $user = $this->getUserData($result->access_token);

                $user_data = [
                    "email"=> $user->emailAddress,
                    "name"=> $user->firstName . " " . $user->lastName,
                    "linkedin_id"=> $user->id,
                    "public_profile"=> $user->publicProfileUrl,
                    "access_token"=> $result->access_token,
                    "expiry"=> $result->expires_in
                ];

                // DB::table('linkedin_user')->insert($user_data);
            }

            return view('linkedin_user_data')
                ->with('user_data', $user_data);
        } else {
            echo $errDescription;
        }

    }

    public function getUserData($access_token) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,public-profile-url,phone-numbers)?format=json");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $access_token"
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result);
        return $result;
    }
}
