<div class="mobile-menu-wrap mobile-header-border">
    <div class="main-categori-wrap mobile-header-border">
        <a class="categori-button-active-2" href="#">
            <span class="fi-rs-apps"></span> Browse Categories
        </a>
        <div class="categori-dropdown-wrap categori-dropdown-active-small">
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route('product.category',['category_slug'=>$category->slug]) }}"><i class="surfsidemedia-font-dress"></i>{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- mobile menu start -->
    <nav>
        <ul class="mobile-menu">
            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Home</a></li>
            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('shop') }}">Shop</a></li>
            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('shop.cart') }}">Cart</a></li>
            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('about') }}">About</a></li>
            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('contact') }}">Contact</a></li>
            @auth
                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">My Account</a>
                <ul class="dropdown">
                    @if(Auth::user()->utype == 'ADM')
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
                    @else
                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>   
                        <li><a href="{{ route('user.orders') }}">My Orders</a></li>    
                        <li><a href="{{ route('user.changepassword') }}">Change Password</a></li> 
                    @endif            
                </ul>
            @endif
            </li>
            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                <ul class="dropdown">
                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                        <ul class="dropdown">
                            <li><a href="product-details.html">Dresses</a></li>
                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                            <li><a href="product-details.html">Women's Sets</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                        <ul class="dropdown">
                            <li><a href="product-details.html">Jackets</a></li>
                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                            <li><a href="product-details.html">Genuine Leather</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                        <ul class="dropdown">
                            <li><a href="product-details.html">Gaming Laptops</a></li>
                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                            <li><a href="product-details.html">Tablets</a></li>
                            <li><a href="product-details.html">Laptop Accessories</a></li>
                            <li><a href="product-details.html">Tablet Accessories</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li> --}}
            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                <ul class="dropdown">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- mobile menu end -->
</div>
<div class="mobile-header-info-wrap mobile-header-border">
    {{-- <div class="single-mobile-header-info mt-30">
        <a href="contact.html"> Our location </a>
    </div>
    <div class="single-mobile-header-info">
        <a href="{{ route('login') }}">Log In </a>                        
    </div>
    <div class="single-mobile-header-info">                        
        <a href="{{ route('register') }}">Sign Up</a>
    </div>
    <div class="single-mobile-header-info">
        <a href="#">(+1) 0000-000-000 </a>
    </div> --}}
    @auth
        <div class="single-mobile-header-info">
            <form action="{{ route('logout') }}" method="POST"> 
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
            </form>                       
        </div>
        <div class="single-mobile-header-info">
            <a href="tel:{{ $setting->phone }}">{{ $setting->phone }} </a>
        </div>
        <div class="single-mobile-header-info">
            <a href="#">{{ $setting->email }} </a>
        </div>
    @else
        <div class="single-mobile-header-info">
            <a href="{{ route('login') }}">Log In </a>                        
        </div>
        <div class="single-mobile-header-info">                        
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
        <div class="single-mobile-header-info">
            <a href="tel:{{ $setting->phone }}">{{ $setting->phone }} </a>
        </div>
        <div class="single-mobile-header-info">
            <a href="#">{{ $setting->email }} </a>
        </div>
    @endif   
</div>
<div class="mobile-social-icon">
    <h5 class="mb-15 text-grey-4">Follow Us</h5>
    <a href="{{ $setting->facebook }}" target="_blank"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
    <a href="{{ $setting->twitter }}" target="_blank"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
    <a href="{{ $setting->instagram }}" target="_blank"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
    <a href="{{ $setting->pinterest }}" target="_blank"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
    <a href="{{ $setting->youtube }}" target="_blank"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
</div>