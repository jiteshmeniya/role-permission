<?php

namespace App\Http\Livewire\Select2;

use App\Models\Product;
use Livewire\Component;

class Select2 extends Component
{
    public $productList = [
        'Fruit',
        'Vegetable',
        'Chocolate',
        'Egg',
        'Fish',
        'Chemical',
        'Dairy Product',
    ];

    public $products, $name,$category = [];

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.select2.select2');
    }

    public function store()
    {
        $input = [
            'name' => $this->name,
            'category' => json_encode($this->category),
        ];
        Product::create($input);
        $this->name = '';
        $this->category = '';
        $this->emit('productStore');
    }
}
