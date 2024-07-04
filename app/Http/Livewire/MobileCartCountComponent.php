<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MobileCartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('shop.checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $sale = Sale::find(1);
        return view('livewire.mobile-cart-count-component',['sale'=>$sale]);
    }
}
