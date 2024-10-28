<style>
    .dropdown-item {
        font-size: 16px !important;
    }

    ::placeholder {
        color: #000 !important;
        opacity: 1;
        /* Firefox */
    }
</style>
<header class="ps-header ps-header--2">
    @if (!empty(optional($setting)->website_name) || !empty(optional($setting)->site_motto))
        <div class="ps-noti">
            <div class="container">
                <p class="m-0">Welcome to {{ optional($setting)->website_name }}, {{ optional($setting)->site_motto }}
                </p>
            </div>
            <a class="ps-noti__close">
                <i class="icon-cross"></i>
            </a>
        </div>
    @endif
    <div class="ps-header__top">
        <div class="container">
            <div class="ps-header__text"> {{ optional($setting)->site_motto }} </div>
            <div class="ps-top__right">
                <div class="ps-top__social">
                    <ul class="ps-social">
                        @if (optional($setting)->facebook_url)
                            <li><a class="ps-social__link facebook" href="{{ optional($setting)->facebook_url }}">
                                    <i class="fa fa-facebook"> </i>
                                    <span class="ps-tooltip">Facebook</span>
                                </a>
                            </li>
                        @endif
                        @if (optional($setting)->instagram_url)
                            <li><a class="ps-social__link instagram" href="{{ optional($setting)->instagram_url }}"><i
                                        class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                        @endif
                        @if (optional($setting)->youtube_url)
                            <li><a class="ps-social__link youtube" href="{{ optional($setting)->youtube_url }}"><i
                                        class="fa fa-youtube-play"></i><span class="ps-tooltip">Youtube</span></a></li>
                        @endif
                        @if (optional($setting)->linkedin_url)
                            <li><a class="ps-social__link linkedin" href="{{ optional($setting)->linkedin_url }}"><i
                                        class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                        @endif
                    </ul>
                </div>
                <ul class="menu-top">
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">My Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.order.history') }}">My Order History</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
                    <li class="nav-item"><a class="nav-link" href="{{ route('allBlog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">About</a></li>
                </ul>
                @if (!empty(optional($setting)->primary_phone))
                    <div class="ps-header__text">Need help? <strong>{{ optional($setting)->primary_phone }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ !empty(optional($setting)->site_logo_black) ? asset('storage/' . optional($setting)->site_logo_black) : asset('frontend/img/logo.png') }}"
                        alt="">
                    <img class="sticky-logo"
                        src="{{ !empty(optional($setting)->site_logo_black) ? asset('storage/' . optional($setting)->site_logo_black) : asset('frontend/img/logo.png') }}"
                        alt="">
                </a>
            </div>
            <a class="ps-menu--sticky" href="#">
                <i class="fa fa-bars"></i>
            </a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li>
                        {{-- Log Out --}}
                        <a class="ps-header__item" href="javascript:void(0)" id="login-modal">
                            <i class="icon-user"></i>
                        </a>
                        @auth
                            <div class="ps-login--modal">
                                <!-- If the user is authenticated, show these options -->
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                                <!-- Hidden logout form -->
                                <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="ps-login--modal">
                                {{-- <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <x-input-label class="form-label form__label" for="email" :value="__('Email')" />
                                        <input class="form-control" type="email" name="email" :value="old('email')"
                                            required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label class="ps-form__label form-label" for="password" :value="__('Password')" />
                                        <div class="input-group">
                                            <x-text-input class="form-control form-control-solid ps-form__input"
                                                type="password" id="password" name="password" required
                                                autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            <div
                                                class="input-group-append bg-light text-center d-flex align-items-center p-3 rounded-3 border">
                                                <a class="fa fa-eye-slash toogle-password" href="javascript:void(0);"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">Remember me</label>
                                    </div>
                                    <x-primary-button class="ps-btn ps-btn--warning" type="submit">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                    <div class="pt-3">
                                        @if (Route::has('password.request'))
                                            <span>Lost your</span><a class="ps-account__link site_text_color_links"
                                                href="{{ route('password.request') }}"> password?</a> <br>
                                            <span class="ps-5">Account? <a
                                                    class="ps-account__link site_text_color_links"
                                                    href="{{ route('register') }}">Create New Accounts</a></span>
                                        @endif
                                    </div>
                                </form> --}}
                                {{-- If Not Logged In --}}
                                @guest
                                    <div>
                                        <p>Already Have An Account?</p>
                                        <a class="ps-btn ps-btn--warning" href="{{ route('login') }}">
                                            Log in
                                        </a>
                                    </div>
                                    <div>
                                        <p>Don't Have An Account?</p>
                                        <a class="ps-btn ps-btn--warning" href="{{ route('register') }}">
                                            Register
                                        </a>
                                    </div>
                                @endguest

                                {{-- If Logged In --}}
                                @auth
                                    <div>
                                        <p>Manage Your Dashboard?</p>
                                        <a class="ps-btn ps-btn--warning" href="{{ route('dashboard') }}">
                                            Dashboard
                                        </a>
                                    </div>
                                    <div>
                                        <p>Want to Log Out?</p>
                                        <a class="ps-btn ps-btn--warning" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Log Out
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        @endauth
                    </li>
                    <li>
                        <a class="ps-header__item" href="{{ route('user.wishlist') }}">
                            <i class="fa fa-heart-o"></i>
                            @php
                                $wishlistCount = 0; // Default value in case user is not authenticated
                                if (Auth::check()) {
                                    $userId = Auth::id();
                                    $wishlistCount = App\Models\Wishlist::where('user_id', $userId)->count();
                                }
                            @endphp
                            <span class="badge wishlistCount">{{ $wishlistCount }}</span>

                        </a>
                    </li>
                    <li>
                        <a class="ps-header__item" href="#" id="cart-mini">
                            <i class="icon-cart-empty"></i>
                            <span class="badge cartCount">{{ Cart::instance('cart')->count() }}</span></a>
                        <div class="ps-cart--mini miniCart">
                            @include('frontend.pages.cart.partials.minicart')
                        </div>
                    </li>
                </ul>
                <div class="ps-header__search">
                    <form action="{{ route('allproducts') }}">
                        <div class="ps-search-table">
                            <div class="input-group rounded-pill">
                                <input id="search_text" class="form-control ps-input search_text" type="text"
                                    placeholder="Search for products">
                                <div class="input-group-append">
                                    {{-- <a href="#"><i class="fa fa-search"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="search_container" class="ps-search--result search_container d-none"
                        style="height: 44vh;overflow-y: auto;">
                        <!-- Search results will be injected here -->
                    </div>
                </div>
                @if (!empty(optional($setting)->primary_phone))
                    <div class="ps-middle__text">Need help? <strong>{{ optional($setting)->primary_phone }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="ps-navigation">
        <div class="container-fluid text-center" style="border-bottom: 1px solid #f0f2f5;">
            <div class="container">
                <div class="ps-navigation__left">
                    <nav class="ps-main-menu">
                        <ul class="menu">
                            @foreach ($categories->slice(0, 6) as $category)
                                <li class="">
                                    <a href="{{ route('category.products', $category->slug) }}">{{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="">
                                <a href="{{ route('allproducts') }}"> Shop
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="ps-header ps-header--13 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">{{ optional($setting)->website_name }}, {{ optional($setting)->site_motto }}</p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-header__left">
                <ul class="ps-header__icons">
                    <li>
                        <a class="ps-header__item open-search" href="#">
                            <i class="fa fa-search" aria-hidden="true" style="font-family: 'FontAwesome';">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ps-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ !empty(optional($setting)->site_logo_black) ? asset('storage/' . optional($setting)->site_logo_black) : asset('frontend/img/logo.png') }}"
                        alt="">
                </a>
            </div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li>
                        <a class="ps-header__item" href="{{ asset('mycart') }}">
                            <i class="icon-cart-empty"></i>
                            <span class="badge cartCount">{{ Cart::instance('cart')->count() }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
<div class="ps-search">
    <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#"
            id="close-search"><i class="icon-cross"></i></a>
        <h3>Search</h3>
        <form action="{{ route('allproducts') }}">
            <div class="ps-search-table">
                <div class="input-group">
                    <input id="search_text" class="form-control form-control search_text" type="text"
                        placeholder="Search for products">
                    <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                </div>
            </div>
        </form>
        <div id="search_container" class="ps-search--result search_container d-none" style="height: 60vh;overflow-y: auto;">
            <!-- Search results will be injected here -->
        </div>
    </div>
</div>
<script>
    function handleLogout() {
        fetch('{{ route('logout') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    _method: 'POST'
                })
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = '{{ url('/') }}'; // Redirect after logout
                } else {
                    console.error('Logout failed.');
                }
            })
            .catch(error => console.error('Logout error:', error));
    }
</script>
