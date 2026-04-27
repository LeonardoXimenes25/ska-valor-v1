<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // redirect to google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        // Ambil user dari Google saja
        $googleUser = Socialite::driver('google')->user();

        // Gunakan email atau google_id untuk mencari/membuat user
        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'avatar' => $googleUser->getAvatar(),
            'password' => null, 
        ]);

        Auth::login($user);

        return redirect()->intended('/admin');

    } catch (Exception $e) {
        // Log error jika perlu: \Log::error($e->getMessage());
        return redirect('/admin/login')->with('error', 'Ada masalah saat login Google.');
    }
}
}
