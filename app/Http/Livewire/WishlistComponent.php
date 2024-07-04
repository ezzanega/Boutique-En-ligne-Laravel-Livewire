<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                $this->emitTo('mobile-count-wishlist-component','refreshComponent');
                return;
            }
        }
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('mobile-cart-count-component','refreshComponent');
        $this->emitTo('mobile-count-wishlist-component','refreshComponent');
    }

    public function render()
    {
        $nproducts = Product::Latest()->take(4)->get();
        $sale = Sale::find(1);
        return view('livewire.wishlist-component',['sale'=>$sale,'nproducts'=>$nproducts]);
    }
}
