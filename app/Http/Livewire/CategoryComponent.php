<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Sale;

class CategoryComponent extends Component
{
    public $sorting = "Default Sorting";
    public $pagesize = 12;
    public $category_slug;

    public $min_price;
    public $max_price;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
        $this->pagesize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->sorting = $order;
    }

    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('mobile-count-wishlist-component','refreshComponent');
    }

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

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $categorie_name = $category->name;

        if($this->sorting=='Price: Low to High')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='Price: High to Low')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='Sort By Newness')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->where('category_id',$category_id)->paginate($this->pagesize);
        }

        $nproducts = Product::Latest()->take(4)->get();

        $categories = Category::all();
        $sale = Sale::find(1);

        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'categorie_name'=>$categorie_name,'sale'=>$sale,'nproducts'=>$nproducts]);
    }
}
