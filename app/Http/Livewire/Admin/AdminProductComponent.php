<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $searchTerm;
    public $product_id;

    public function deleteProduct()
    {
        $product = Product::find($this->product_id);
        if($product->image)
        {
            unlink('assets\imgs\shop'.'/'.$product->image);
        }
        if($product->images)
        {
            $images = explode(",",$product->images);
            foreach($images as $image)
            {
                if($image)
                {
                    unlink('assets\imgs\shop'.'/'.$image);
                }
            }
        }
        $product->delete();
        session()->flash('message','Product has been deleted successfully!');
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $products = Product::where('name','like',$search)
        ->orWhere('stock_status','like',$search)
        ->orWhere('regular_price','like',$search)
        ->orWhere('sale_price','like',$search)
        ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
