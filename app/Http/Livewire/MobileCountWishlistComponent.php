<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MobileCountWishlistComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.mobile-count-wishlist-component');
    }
}
