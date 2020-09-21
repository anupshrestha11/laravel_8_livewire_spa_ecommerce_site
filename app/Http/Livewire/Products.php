<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function edit($id)
    {
        return redirect()->to(route('dashboard.showEditProduct', $id));
    }


    public function delete($id)
    {
        $product = Product::find($id)->get();
        Storage::disk('public')->delete('images/' . $product[0]->image_name);
        $product = Product::find($id)->delete();
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.products', [
            'products' => Product::orderBy('id', 'desc')->paginate(5)
        ])->extends('layouts.dashboard');
    }
}
