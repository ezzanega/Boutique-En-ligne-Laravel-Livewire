<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function update($fileds)
    {
        $this->validateOnly($fileds,[
            'rating' => 'required',
            'comment' => 'required'
        ]);
    }

    public function addReview()
    {
        $this->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->rstatus = true;
        $review->save();
        session()->flash('message','Your review has been added successfully!');
    }

    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component',['orderItem'=>$orderItem]);
    }
}
