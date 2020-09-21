<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{


    public $form = [
        "name" => '',
        "email" => '',
        "password" => '',
        "password_confirmation" => ''
    ];

    protected $rules = [
        'form.name' => 'required',
        'form.email' => 'required|email',
        'form.password' => 'required|confirmed|min:6',
    ];


    public function submit()
    {
        $this->validate();

        User::create($this->form);

        $this->form = [
            "name" => '',
            "email" => '',
            "password" => '',
            "password_confirmation" => ''
        ];

        return redirect()->to(route('login'));
    }


    public function render()
    {
        return view('livewire.register')->extends('layouts.blank');
    }
}
