<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $form = [
        "email" => '',
        "password" => ''
    ];

    public $rules = [
        'form.email' => 'required|email',
        'form.password' => 'required|min:6'
    ];

    public function submit()
    {
        $this->validate();
        if (Auth::attempt($this->form))
            return redirect()->to(route('dashboard'));
        else {
            session()->flash('login_error', 'Login Credential doesn\'t Match. Try Again');
        }
    }

    public function render()
    {
        return view('livewire.login')->extends('layouts.blank');
    }
}
