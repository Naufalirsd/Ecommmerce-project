<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Http\Request;

#[Title('Login')]
class LoginPage extends Component
{
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8'], // Contoh: minimal 8 karakter
        ]);

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('email', 'Email atau password salah.');
            $this->addError('password', 'Email atau password salah.');

            return;
        }

        return redirect()->intended();

    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
