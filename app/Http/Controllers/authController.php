<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{
    function index()
    {
        return view('auth.index');
    }

    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function callback()
    {
        $user = Socialite::driver('google')->user();
        $google_id = $user->id;
        $google_email = $user->email;
        $google_name = $user->name;

        $check_account = User::where('email', $google_email)->count();

        if ($check_account > 0) {
            $user_model = User::updateOrCreate(
                ['email' => $google_email],
                [
                    'name' => $google_name,
                    'google_id' => $google_id
                ]
            );

            // return "<h1>Email terdaftar</h1><p>Nama: $google_name</p>";
            Auth::login($user_model);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'Akun yang digunakan tidak mempunyai izin untuk mengakses halaman pengelola.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
