<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            session()->regenerate();

            return redirect()->intended('/admin');
        }

        session()->flash('error', 'Email ka password sala');
    }

    // login with google
    public function loginWithGoogle()
    {
        return redirect()->route('auth.google');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}