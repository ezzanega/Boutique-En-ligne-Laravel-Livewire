<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    // public function destroy($rowId)
    // {
    //     Cart::instance('cart')->remove($rowId);
    //     $this->emitTo('cart-count-component','refreshComponent');
    //     session()->flash('success_message','Item has been removed');
    // }

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
        return view('livewire.cart-count-component',['sale'=>$sale]);
    }
}
