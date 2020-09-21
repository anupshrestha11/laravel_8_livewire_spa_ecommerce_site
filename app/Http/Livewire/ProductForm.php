<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;


    public $form = [
        'id' => '',
        'name' => '',
        'sku' => '',
        'price' => '',
        'description' => '',
        'quantity' => '',
        'image' => '',
        'image_name' => ''
    ];


    protected $rules = [
        'form.name' => 'required',
        'form.sku' => 'required',
        'form.price' => 'required',
        'form.description' => 'required',
        'form.quantity' => 'required',
        'form.image' => 'required|image|max:1024',
    ];



    public function updated($field)
    {
        $this->validateOnly($field, [
            'form.name' => 'required',
            'form.sku' => 'required',
            'form.price' => 'required',
            'form.description' => 'required',
            'form.quantity' => 'required',
            'form.image' => 'required|image|max:1024',
        ]);
    }




    public function submit()
    {

        $this->validate();


        $filename = $this->form['image']->getClientOriginalName();
        $this->form['image']->storeAs('images', $filename, 'public');

        $this->form['image_name'] = $filename;

        Product::create($this->form);
        $this->form = [
            'name' => '',
            'sku' => '',
            'price' => '',
            'description' => '',
            'quantity' => '',
            'image' => '',
            'image_name' => ''
        ];
        session()->flash('msg', 'Product Added Successfully .');
        return redirect()->to(route('dashboard.products'));
    }

    public function render()
    {
        return view('livewire.product-form')->extends('layouts.dashboard');
    }
}
