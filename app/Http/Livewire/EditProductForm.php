<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductForm extends Component
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
        'form.image' => 'image|max:1024',
    ];

    public function mount(Product $product)
    {

        $this->form = [
            'id' => strval($product->id),
            'name' => $product->name,
            'sku' => $product->sku,
            'price' => strval($product->price),
            'description' => $product->description,
            'quantity' => strval($product->quantity),
            'image' => '',
            'image_name' => $product->image_name
        ];
    }



    // public function updated($field)
    // {
    //     $this->validateOnly($field, [
    //         'form.name' => 'required',
    //         'form.sku' => 'required',
    //         'form.price' => 'required',
    //         'form.description' => 'required',
    //         'form.quantity' => 'required',
    //         'form.image' => 'image|max:1024',
    //     ]);
    // }




    public function submit()
    {

        $this->validate();

        $product = Product::find($this->form['id'])->get();

        if ($this->form['image'] != "") {
            Storage::disk('public')->delete('images/' . $product[0]->image_name);
            $filename = $this->form['image']->getClientOriginalName();
            $this->form['image']->storeAs('images', $filename, 'public');
            $this->form['image_name'] = $filename;
        }

        Product::where('id', $this->form['id'])->update([
            'name' => $this->form['name'],
            'sku' => $this->form['sku'],
            'price' => $this->form['price'],
            'description' => $this->form['description'],
            'quantity' => $this->form['quantity'],
            'image_name' => $this->form['image_name'],
        ]);
        $this->form = [
            'id' => '',
            'name' => '',
            'sku' => '',
            'price' => '',
            'description' => '',
            'quantity' => '',
            'image' => '',
            'image_name' => ''
        ];
        session()->flash('msg', 'Product Updated Successfully .');
        return redirect()->to(route('dashboard.products'));
    }
    public function render()
    {
        return view('livewire.edit-product-form')->extends('layouts.dashboard');
    }
}
