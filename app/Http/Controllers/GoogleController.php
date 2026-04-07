<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user di database TiDB berdasarkan email Google
            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'password' => null, // Karena login via Google
            ]);

            Auth::login($user);

            // Redirect ke halaman utama Filament
            return redirect()->intended('/admin');

        } catch (Exception $e) {
            return redirect('/admin/login')->with('error', 'Ada masalah saat login Google.');
        }
    }
}
