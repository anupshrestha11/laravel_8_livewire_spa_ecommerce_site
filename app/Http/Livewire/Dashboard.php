<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public $msg;

    public function mount()
    {
        $this->msg = "hello from dashboard ";
    }

    public function render()
    {
        return view('livewire.dashboard')->extends('layouts.dashboard');
    }
}
