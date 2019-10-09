<?php


namespace App\Http\Controllers;


use App\User;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;
use Mockery\Exception;

class OauthController extends Controller
{
    use AuthenticatesUsers;


    public function cognito ()
    {
        return view('cognito');
    }


    public function showLoginForm ()
    {
        if (Auth::user()) {
            return $this->successLogin();
        }
        return view('login');
    }

    public function login (Request $request)
    {
        if (Auth::attempt(request()->except(['_token']))) {
            return Crypt::encryptString(Auth::user()->api_key);
        }

        return 'error';
    }


    private function successLogin()
    {
        return view('logClient', ['token' => Crypt::encryptString(Auth::user()->api_key)]);
    }

    public function register (Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }

    public function getUser ($api_key)
    {

        try {
            $decryptedApiKey = Crypt::decryptString($api_key);
            $user =  User::where('api_key', $decryptedApiKey)->first();
        } Catch (DecryptException $e){
            $user = '';
        }


        return $user ?: 'error';
    }
}
