<header class="header">
    <div class="header_top" style=" background-image: url('{{ asset('clients/img/banner/banner.jpg') }}');"></div>
    <div class="header_middle">
        <div class="container">
            <a href="{{ route('client.home') }}" class="logo">
                <img srcset="{{ asset('clients/img/logo/main-logo.png 2x') }}" class="logo-img" alt="" />
            </a>
            <form class="search">
                <input type="text" name="" id="" class="search_info"
                    placeholder="Input you search in here ..." />
                <ul class="search-ajax-result" hidden>
                </ul>
            </form>
            <div class="cto">
                <a href="{{ route('client.registation') }}" class="regist cto-select">
                    <img src="{{ asset('clients/img/icon/contract.png') }}" class="cto-icon" alt="" />
                    <span class="cto-sub">Regist</span>
                </a>
                @if (!Auth::check())
                    <a href="{{ route('client.login') }}" class="login cto-select">
                        <img src="{{ asset('clients/img/icon/user.png') }}" alt="" class="cto-icon" />
                        <span class="cto-sub">Login</span>
                    </a>
                @else
                    <form action="{{ route('client.logout') }}" method="post" enctype="multipart/form">
                        @csrf
                        <div style="display:flex;">
                            <a href="" class="login cto-select">
                                <button class="cto-sub" style="background-color:red; color:white">Logout</button>
                            </a>
                            <a href="" class="login cto-select">
                                <img src="{{ asset('clients/img/icon/user.png') }}" alt="" class="cto-icon" />
                                <span class="cto-sub">User</span>
                            </a>
                        </div>
                    </form>
                @endif
                <a href="" class="cart cto-select">
                    <img src="{{ asset('clients/img/icon/shopping-cart.png') }}" alt="" class="cto-icon" />
                    <span>Cart</span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bot">
        <div class="container">
            <div class="categories">
                <img src="{{ asset('clients/img/icon/menu.png') }}" class="categories_img" alt="" />
                <span>Categories</span>
                <ul class="categories_list">
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/laptop.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">Laptop Gaming</span>
                        </a>
                        <ul class="sub-menu">
                            <h2 class="title">Brands</h2>
                            <li><a href="">ACER</a></li>
                            <li><a href="">MSI</a></li>
                            <li><a href="">LENOVO</a></li>
                            <li><a href="">HP</a></li>
                            <li><a href="">DELL</a></li>
                            <li><a href="">GIGABYTE</a></li>
                        </ul>
                    </li>
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/laptop.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">Office Laptop</span>
                        </a>
                        <ul class="sub-menu">
                            <h2 class="title">Brands</h2>
                            <li><a href="">ACER</a></li>
                            <li><a href="">MSI</a></li>
                            <li><a href="">LENOVO</a></li>
                            <li><a href="">HP</a></li>
                            <li><a href="">DELL</a></li>
                            <li><a href="">GIGABYTE</a></li>
                        </ul>
                    </li>
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/laptop.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">PC Industry</span>
                        </a>
                        <ul class="sub-menu">
                            <h2 class="title">Full solutions</h2>
                            <li><a href="">Homework Pentium + Screen</a></li>
                            <li><a href="">Homework I3 + Screen</a></li>
                            <li><a href="">Homework Mini Pentium + Screen</a></li>
                            <li><a href="">Homework Mini I3 + Screen</a></li>
                        </ul>
                    </li>
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/laptop.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">PC Gaming - Designer</span>
                        </a>
                    </li>
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/electrical-component.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">Screen</span>
                        </a>
                    </li>
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/keyboard.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">Keyboard</span>
                        </a>
                    </li>
                    <li class="categories_sub">
                        <a href="" class="categories-item">
                            <img src="{{ asset('clients/img/icon/apple.png') }}" alt=""
                                class="categories-icon" />
                            <span class="categories-desc">Apple</span>
                        </a>
                    </li>
                </ul>
            </div>
            <a href="" class="another_page">News</a>
            <a href="" class="another_page">Contact Us</a>
            <a href="" class="another_page">About Us</a>
        </div>
    </div>
</header>
