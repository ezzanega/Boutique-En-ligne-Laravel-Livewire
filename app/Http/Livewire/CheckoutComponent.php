<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Sale;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $paymentmode;
    public $thankyou;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->email = $user->email;
        $this->mobile = $user->profile->mobile ?? '';
        $this->line1 = $user->profile->line1 ?? '';
        $this->line2 = $user->profile->line2 ?? '';
        $this->city = $user->profile->city ?? '';
        $this->province = $user->profile->province ?? '';
        $this->country = $user->profile->country ?? '';
        $this->zipcode = $user->profile->zipcode ?? '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);

        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required'
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;  
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0 ;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required'
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;  
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }

        if($this->paymentmode == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou =1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        
        $this->sendOrderConfirmationMail($order);
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('shop.cart');
        }
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function render()
    {
        $this->verifyForCheckout();
        $sale = Sale::find(1);
        return view('livewire.checkout-component',['sale'=>$sale]);
    }
}
