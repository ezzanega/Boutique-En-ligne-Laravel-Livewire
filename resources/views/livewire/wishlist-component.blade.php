<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if(Cart::instance('wishlist')->content()->count() > 0)
                        <div class="row product-grid-3">
                            @foreach (Cart::instance('wishlist')->content() as $item)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug' =>$item->model->slug]) }}">
                                                    <img class="default-img" src="{{ asset('assets/imgs/shop/') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
                                                    <img class="hover-img" src="{{ asset('assets/imgs/shop/') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                <a aria-label="Remove To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="removeFromWishlist({{ $item->model->id }})"><i class="fi-rs-cross-small"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                            </h2>
                                            {{-- <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div> --}}

                                            <div class="product-price">
                                                @if ($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <span>${{ $item->model->sale_price }} </span>
                                                    <span class="old-price">${{ $item->model->regular_price }}</span>
                                                @else
                                                    <span>${{ $item->model->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Move To Cart" class="action-btn hover-up" href="#" wire:click.prevent="moveToCart('{{ $item->rowId }}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h4 style="padding-top:30px; text-align: center;">No item in wishlist</h4>
                    @endif
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <div class="pb-10 mb-20 widget-header position-relative">
                            <h5 class="mb-10 widget-title">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($nproducts as $nproduct)
                            <div class="clearfix single-post">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/shop') }}/{{ $nproduct->image }}" alt="#">
                                </div>
                                <div class="pt-10 content">
                                    <h5><a href="{{ route('product.details',['slug'=>$nproduct->slug]) }}">{{ $nproduct->name }}</a></h5>
                                    <p class="mt-5 mb-0 price">${{ $nproduct->regular_price }}</p>
                                    {{-- <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                        <img src="{{ asset('assets/imgs/banner/banner-11.jpg') }}" alt="">
                        <div class="banner-text">
                            <span>Women Zone</span>
                            <h4>Save 17% on <br>Office Dress</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>