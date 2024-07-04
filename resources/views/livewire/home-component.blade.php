<main class="main">
    <section class="home-slider position-relative pt-50" wire:ignore>
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($sliders as $slide)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ $slide->title }}</h4>
                                    <h2 class="animated fw-900">{{ $slide->subtitle }}</h2>
                                    {{-- <h1 class="animated fw-900 text-brand">On all products</h1> --}}
                                    <p class="animated">Only Price: ${{ $slide->price }}</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{ $slide->link }}"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{ asset('assets/imgs/slider') }}/{{ $slide->image }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach               
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        {{-- <div class="bg-square"></div> --}}
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($categories as $key=>$category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $key== 0 ? 'active':'' }}" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#category_{{ $category->id }}" type="button" role="tab" aria-controls="tab-one" aria-selected="true">{{ $category->name }}</button>                        
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('shop') }}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                @foreach ($categories as $key=>$category)
                    <div class="tab-pane fade show {{ $key== 0 ? 'active':'' }}" id="category_{{ $category->id }}" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @php
                                $c_products = DB::table('products')->where('category_id',$category->id)->get()->take($no_of_products);
                            @endphp
                            @foreach ($c_products as $c_product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    @php
                                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                                    @endphp
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details',['slug'=>$c_product->slug]) }}">
                                                    <img class="default-img" src="{{ asset('assets/imgs/shop') }}/{{ $c_product->image }}" alt="">
                                                    <img class="hover-img" src="{{ asset('assets/imgs/shop') }}/{{ $c_product->image }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"  href="{{ route('product.details',['slug'=>$c_product->slug]) }}"><i class="fi-rs-eye"></i></a>
                                                @if($witems->contains($c_product->id))
                                                    <a aria-label="Remove To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="removeFromWishlist({{ $c_product->id }})"><i class="fi-rs-cross-small"></i></a>
                                                @else
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{ $c_product->id }},'{{ $c_product->name }}',{{ $c_product->regular_price }})"><i class="fi-rs-heart"></i></a>
                                                @endif
                                                {{-- <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                {{-- <a href="{{ route('shop') }}">Clothing</a> --}}
                                            </div>
                                            <h2><a href="{{ route('product.details',['slug'=>$c_product->slug]) }}">{{ $c_product->name }}</a></h2>
                                            {{-- <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div> --}}
                                            <div class="product-price">
                                                @if($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <span>${{ $c_product->sale_price }} </span>
                                                    <span class="old-price">${{ $c_product->regular_price }}</span>
                                                @else
                                                    <span>${{ $c_product->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                @if ($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('shop.cart') }}" wire:click.prevent="store({{ $c_product->id }},'{{ $c_product->name }}',{{ $c_product->sale_price }})"><i class="fi-rs-shopping-bag-add"></i></a>
                                                @else
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('shop.cart') }}" wire:click.prevent="store({{ $c_product->id }},'{{ $c_product->name }}',{{ $c_product->regular_price }})"><i class="fi-rs-shopping-bag-add"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                @endforeach
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="assets/imgs/banner/banner-4.png" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="{{ route('shop') }}" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-1.png" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-2.png" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="assets/imgs/banner/banner-3.png" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="{{ route('shop') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding" wire:ignore>
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($lproducts as $lproduct)
                        <div class="product-cart-wrap small hover-up">
                            @php
                                $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.details',['slug'=>$lproduct->slug]) }}">
                                        <img class="default-img" src="{{ asset('assets/imgs/shop') }}/{{ $lproduct->image }}" alt="">
                                        <img class="hover-img" src="{{ asset('assets/imgs/shop') }}/{{ $lproduct->image }}" alt="">
                                    </a>
                                </div>
                                {{-- <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up"><i class="fi-rs-eye"></i></a>
                                    <a aria-label="Remove To Wishlist" class="action-btn small hover-up" href="#" tabindex="0" ><i class="fi-rs-cross"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                </div> --}}
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ route('product.details',['slug'=>$lproduct->slug]) }}">{{ $lproduct->name }}</a></h2>
                                {{-- <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div> --}}
                                <div class="product-price">
                                    @if($lproduct->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <span>${{ $lproduct->sale_price }} </span>
                                        <span class="old-price">${{ $lproduct->regular_price }}</span>
                                    @else
                                        <span>${{ $lproduct->regular_price }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--End product-cart-wrap-2-->
                </div>
            </div>
        </div>
    </section>
   
    <section class="section-padding" wire:ignore>
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>