<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
    <script src="/scripts.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</head>

<body>

    <header class="header">
        <a href="/" class="logo">logo</a>
        <nav class="navbar">
            <ul>
                <li>
                    <x-nav-link href="/">
                    <p class="font-medium tracking-normal text-xl ml-6"> Home</p>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/products" :active="request()->routeIs('products')">
                    <p class="font-medium tracking-normal text-xl ml-6"> Catalog</p>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/about" :active="request()->routeIs('about')">
                    <p class="font-medium tracking-normal text-xl ml-6"> About</p>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/blog" :active="request()->routeIs('about')">
                        <p class="font-medium tracking-normal text-xl ml-6"> Blogs</p>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{asset('favorites')}}">
                        <p class="font-medium tracking-normal text-xl ml-6">Favorites</p>
                    </x-nav-link>
                </li>
                <!-- <li><a href="#">pages +</a>
                    <ul>
                        <li><a href="about.html">about</a></li>
                        <li><a href="blogs.html">blogs</a></li>
                    </ul>
                </li> -->
                <li><x-nav-link href="#">
                <p class="font-medium tracking-normal text-xl ml-6"> Contacts</p>
                    </x-nav-link></li>

                <li>
                    @if(auth()->guest())
                <li><x-nav-link href="/login">
                <p class="font-medium tracking-normal text-xl ml-6"> login</p>
                    </x-nav-link></li>
                <li><x-nav-link href="/register">
                <p class="font-medium tracking-normal text-xl ml-6"> register<p>
                    </x-nav-link></li>
                @else
                <li>

                    <x-nav-link href="{{asset('dashboard')}}">
                    <p class="font-medium tracking-normal text-xl ml-6"> {{ __('Profile') }}</p>
                    </x-nav-link>
                <li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <p class="font-medium tracking-normal text-xl ml-6"> {{ __('Log Out') }}</p>
                        </x-nav-link>
                    </form>
                </li>

                @endif
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <a href="/cart" class="fas fa-shopping-cart"> <span>{{(isset($_COOKIE['order']))? count(explode(',', $_COOKIE['order'])):0}}</span></a>
        </div>
        <form action="{{asset('allproducts')}}" class="search-form">
            @csrf
            <input type="search" name="search" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </header>
    @yield('content')
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="/"><i class="fas fa-angle-right"></i>home</a>
                <a href="/products"><i class="fas fa-angle-right"></i>catalog</a>
                <a href="/about"><i class="fas fa-angle-right"></i>about</a>
                <a href="/blog"><i class="fas fa-angle-right"></i>blogs</a>
                <a href="/contact"><i class="fas fa-angle-right"></i>contact</a>

                <a href="/cart"><i class="fas fa-angle-right"></i>cart</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                @if(auth()->guest())
                <a href="/login"><i class="fas fa-angle-right"></i>login</a>
                <a href="/register"><i class="fas fa-angle-right"></i>register</a>
                @else
                <a href="/profile"><i class="fas fa-angle-right"></i> my account </a>
                <a href="#"><i class="fas fa-angle-right"></i> my order </a>
                <a href="#"><i class="fas fa-angle-right"></i> my wishlist </a>
                @endif
                <a href="/terms"><i class="fas fa-angle-right"></i> terms of use </a>
                <a href="/policy"><i class="fas fa-angle-right"></i> privacy policy </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"><i class="fab fa-twitter"></i> twitter </a>
                <a href="#"><i class="fab fa-instagram"></i> instagram </a>
                <!-- <a href="#"><i class="fab fa-pinterest"></i> pinterest </a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"><i class="fab fa-github"></i> github </a> -->
            </div>
            <div class="box">
                <h3>newsletters</h3>
                <p>subscribe for latest updates</p>
                <form action="">
                    <input type="email" placeholder="enter your email">
                    <input type="submit" value="subscribe" class="btn">
                </form>
            </div>
        </div>
        <div class="credits">created by <span>Valentinahc </span>| all rights reserved</div>
    </section>
</body>

</html>