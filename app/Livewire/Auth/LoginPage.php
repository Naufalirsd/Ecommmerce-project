<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class LoginPage extends Component
{
    public $email = '';
    public $password = '';

    public function save()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            $this->addError('email', 'Email or password is incorrect.');
            return;
        }

        session()->regenerate();

        // ✅ Livewire 3 SPA redirect
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
