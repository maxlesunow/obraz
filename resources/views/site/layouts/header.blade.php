<header class="page-head">
    <!-- RD Navbar Transparent-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default rd-navbar-light" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"><span></span></button>
                    <!--Navbar Brand-->
                    <div class="rd-navbar-brand"><a href="index.html"><img style='margin-top: -5px;margin-left: -15px;' width='138' height='31' src='images/intense/logo-dark.png' alt=''/></a></div>
                </div>
                <div class="rd-navbar-menu-wrap">
                    <div class="rd-navbar-nav-wrap">
                        <div class="rd-navbar-mobile-scroll">
                            <!--Navbar Brand Mobile-->
                            <div class="rd-navbar-mobile-brand"><a href="index.html"><img style='margin-top: -5px;margin-left: -15px;' width='138' height='31' src='images/intense/logo-dark.png' alt=''/></a></div>
                            <div class="form-search-wrap">
                                <!-- RD Search Form-->
                                <form class="form-search rd-search" action="search-results.html" method="GET">
                                    <div class="form-group">
                                        <label class="form-label form-search-label form-label-sm" for="rd-navbar-form-search-widget">Search</label>
                                        <input class="form-search-input input-sm form-control form-control-gray-lightest input-sm" id="rd-navbar-form-search-widget" type="text" name="s" autocomplete="off"/>
                                    </div>
                                    <button class="form-search-submit" type="submit"><span class="mdi mdi-magnify"></span></button>
                                </form>
                            </div>
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li><a href="{{ action ('Site\PageController@home') }}"><span>Главная</span></a>
                                    {{--<ul class="rd-navbar-dropdown">--}}
                                        {{--<li><a href="#"><span class="text-middle">Child Themes</span></a>--}}
                                            {{--<ul class="rd-navbar-dropdown">--}}
                                                {{--<li><a href="intense-photographer-portfolio"><span class="text-middle">Photographer</span></a>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#"><span class="text-middle">Home Types</span></a>--}}
                                            {{--<ul class="rd-navbar-dropdown">--}}
                                                {{--<li><a href="index.html"><span class="text-middle">Default</span></a>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="index-one-page.html"><span class="text-middle">One Page</span></a>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                </li>

                                <li><a href="{{ action ('Site\PageController@about') }}"><span>О компании</span></a></li>

                                <li><a href="{{ action ('Site\PageController@schedule') }}"><span>Расписание курсов</span></a></li>

                                <li><a href="{{ action ('Site\PageController@reviews') }}"><span>Отзывы</span></a></li>

                                <li><a href="{{ action ('Site\PageController@contact') }}"><span>Конакты</span></a></li>
                                <auth></auth>
                            </ul>
                        </div>
                    </div>
                    <!--RD Navbar Search-->
                    <div class="rd-navbar-search"><a class="rd-navbar-search-toggle mdi" data-rd-navbar-toggle=".rd-navbar-inner,.rd-navbar-search" href="#"><span></span></a>
                        <form class="rd-navbar-search-form search-form-icon-right rd-search" action="search-results.html" method="GET">
                            <div class="form-group">
                                <label class="form-label" for="rd-navbar-search-form-input">Введите фразу для поиска и нажмите Enter...</label>
                                <input class="rd-navbar-search-form-input form-control form-control-gray-lightest" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                            </div>
                        </form>
                    </div>
                    <!--RD Navbar shop-->
                    {{--<div class="rd-navbar-cart-wrap"><a class="rd-navbar-cart mdi" href="#" data-rd-navbar-toggle=".rd-navbar-cart-dropdown"><span></span></a>--}}
                        {{--<div class="rd-navbar-cart-dropdown">--}}
                            {{--<ul class="rd-navbar-list-products">--}}
                                {{--<li>--}}
                                    {{--<div class="rd-navbar-product-image"><img src="images/shop/product-01-60x60.png" alt=""/></div>--}}
                                    {{--<div class="rd-navbar-product-caption">--}}
                                        {{--<h6 class="rd-navbar-product-title"><a href="shop-single-product-left-sidebar.html">Fashion model new</a></h6>--}}
                                        {{--<p class="rd-navbar-product-price">$129.99</p>--}}
                                    {{--</div><a class="mdi mdi-window-close rd-navbar-product-remove" href="#"></a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<div class="rd-navbar-product-image"><img src="images/shop/product-01-60x60-3.png" alt=""/></div>--}}
                                    {{--<div class="rd-navbar-product-caption">--}}
                                        {{--<h6 class="rd-navbar-product-title"><a href="shop-single-product-left-sidebar.html">Fashion model new 2</a></h6>--}}
                                        {{--<p class="rd-navbar-product-price">$69.99</p>--}}
                                    {{--</div><a class="mdi mdi-window-close rd-navbar-product-remove" href="#"></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="rd-navbar-cart-total">--}}
                                {{--<h6 class="rd-navbar-cart-total-title">Cart subtotal</h6><span class="rd-navbar-cart-total-price">$199.98</span>--}}
                            {{--</div>--}}
                            {{--<div class="text-center"><a class="btn btn-rect btn-sm btn-primary btn-icon btn-icon-left" href="shop-cart.html"><span class="icon mdi mdi-lock"></span>Go to checkout</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </nav>
    </div>
</header>