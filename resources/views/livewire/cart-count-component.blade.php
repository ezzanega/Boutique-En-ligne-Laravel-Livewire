<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('shop.cart') }}">
        <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
        @if(Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{ Cart::instance('cart')->count() }}</span>
        @endif
    </a>
    
    {{-- @livewire('cart-dropdown-component') --}}

    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        @if(Cart::instance('cart')->count() > 0)
            @foreach (Cart::instance('cart')->content() as $item)
                <ul>
                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{ route('product.details',['slug'=>$item->model->slug]) }}"><img alt="{{ $item->model->name }}" src="{{ asset('assets/imgs/shop') }}/{{ $item->model->image }}"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a></h4>
                            @if($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <h4><span>{{ $item->qty }} × </span>${{ $item->model->sale_price }}</h4>
                            @else
                                <span><span>{{ $item->qty }} × </span>${{ $item->model->regular_price }} </span>
                            @endif
                        </div>
                        {{-- <div class="shopping-cart-delete">
                            <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="fi-rs-cross-small"></i></a>
                        </div> --}}
                    </li>
                </ul>
            @endforeach
                <div class="shopping-cart-footer">
                    <div class="shopping-cart-total">
                        <h4>Subtotal <span>${{ Cart::instance('cart')->Subtotal() }}</span></h4>
                    </div>
                    <div class="shopping-cart-button">
                        <a href="{{ route('shop.cart') }}" class="outline">View cart</a>
                        <a href="#" wire:click.prevent='checkout'>Checkout</a>
                    </div>
                </div>
        @else
            <h5 class="text-center">Your Cart is empty!</h5>
        @endif
    </div>

</div>