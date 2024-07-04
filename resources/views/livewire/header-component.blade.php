<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                    <ul>
                            <li>
                                {{-- <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{ asset('assets/imgs/theme/flag-fr.png') }}" alt="">Français</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/imgs/theme/flag-dt.png') }}" alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/imgs/theme/flag-ru.png') }}" alt="">Pусский</a></li>
                                </ul> --}}
                            </li>                                
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="{{ route('shop') }}">View details</a></li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="{{ route('shop') }}">Shop now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        @auth
                        <ul>                                
                            <li>
                                <i class="fi-rs-user"></i> {{ Auth::user()->name  }} / 
                                    <form action="{{ route('logout') }}" method="POST"> 
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                                    </form>
                            </li>
                        </ul>
                        @else
                        <ul>                                
                            <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Log In </a>  / <a href="{{ route('register') }}">Sign Up</a></li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{ asset('assets/imgs/logo/logoo.png') }}" alt="logo"></a>
                </div>
                <div class="header-right">
                    
                    @livewire('header-search-component')

                    <div class="header-action-right">
                        <div class="header-action-2">
                            @livewire('wishlist-count-component')
                            @livewire('cart-count-component')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{ asset('assets/imgs/logo/logoo.png') }}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                {{-- <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Dresses</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Blouses & Shirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Hoodies & Sweatshirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Women's Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suits & Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Bodysuits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Tanks & Camis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Coats & Jackets</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Bottoms</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Leggings</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Skirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Shorts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Jeans</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Pants & Capris</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Bikini Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Swimwear</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-2.jpg') }}" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-3.jpg') }}" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Jackets & Coats</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Down Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Parkas</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Faux Leather Coats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Trench</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wool & Blends</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vests & Waistcoats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Leather Coats</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Suits & Blazers</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suit Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suit Pants</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vests</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Tailor-made Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-4.jpg') }}" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cellphones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">iPhones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Refurbished Phones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone Parts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Phone Bags & Cases</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Communication Equipments</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Walkie Talkie</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Accessories</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Screen Protectors</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wire Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wireless Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Car Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Power Bank</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Armbands</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Dust Plug</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Signal Boosters</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-5.jpg') }}" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset('assets/imgs/banner/menu-banner-6.jpg') }}" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('product.category',['category_slug'=>$category->slug]) }}"><i class="surfsidemedia-font-desktop"></i>{{ $category->name }}</a></li>
                                @endforeach
                                {{-- <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Jewelry & Accessories</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li> --}}
                                {{-- <li>
                                    <ul class="more_slide_open" style="display: none;">
                                        <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty, Health</a></li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and Shoes</a></li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer Electronics</a></li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles & Motorcycles</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                            {{-- <div class="more_categories">Show more...</div> --}}
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a id="home-link" class="{{ Request::path() == '/' ? 'active' : '' }}" href="/">Home </a></li>
                                <li><a id="about-link" class="{{ Request::is('about*') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                                <li><a id="shop-link" class="{{ Request::is('shop*') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a></li>
                                <li><a id="cart-link" class="{{ Request::is('cart*') ? 'active' : '' }}" href="{{ route('shop.cart') }}">Cart</a></li>
                                <li><a id="contact-link" class="{{ Request::path() == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                                @auth
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    @if(Auth::user()->utype == 'ADM')
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            <li><a href="{{ route('admin.categories') }}">Categories</a></li>
                                            <li><a href="{{ route('admin.products') }}">Products</a></li>
                                            <li><a href="{{ route('admin.homeslider') }}">Manage Home Slider</a></li>
                                            <li><a href="{{ route('admin.homecategories') }}">Manage Home Catgories</a></li>
                                            <li><a href="{{ route('admin.sale') }}">Sale Setting</a></li>
                                            <li><a href="{{ route('admin.coupons') }}">All Coupons</a></li> 
                                            <li><a href="{{ route('admin.orders') }}">All Orders</a></li>   
                                            <li><a href="{{ route('admin.contact') }}">Contact Messages</a></li>    
                                            <li><a href="{{ route('admin.setting') }}">Settings</a></li>                                      
                                            <li><a href="{{ route('admin.profile') }}">My Profile</a></li>                                      
                                        </ul>
                                    @else
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                            <li><a href="{{ route('user.profile') }}">My Profile</a></li>  
                                            <li><a href="{{ route('user.orders') }}">My Orders</a></li>    
                                            <li><a href="{{ route('user.changepassword') }}">Change Password</a></li>                                  
                                        </ul>
                                    @endif
                                </li>
                            @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>  </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @livewire('mobile-count-wishlist-component')
                        @livewire('mobile-cart-count-component')
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
    // Get the current path
    var path = "{{ Request::path() }}";

    // If the path is the homepage, activate the home link
    if (path == "/") {
        document.getElementById("home-link").classList.add("active");
    }
    // If the path is the shop page, activate the shop link
    else if (path.startsWith("/shop")) {
        document.getElementById("shop-link").classList.add("active");
    }
    // If the path is the cart page, activate the cart link
    else if (path.startsWith("/cart")) {
        document.getElementById("cart-link").classList.add("active");
    }
    // If the path is the contact page, activate the contact link
    else if (path == "/contact") {
        document.getElementById("contact-link").classList.add("active");
    }
    // If the path is the VIP page, activate the VIP link
    else if (path == "/user/command/vip") {
        document.getElementById("vip-link").classList.add("active");
    }
</script>

@endpush