<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
    <div class="box-inner">
        <span class="close-menu"><span class="icon pe-7s-close"></span></span>
    </div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<!-- Header -->
<header id="header" class="header style1">
    <div class="top-header">
        <div class="container">
            <div class="inner">
                <div class="main-menu-wapper">
                    <div class="row">
                        <div class="col-sm-8">
                            <ul class="boutique-nav main-menu clone-main-menu">
                                <li class="active menu-item-has-children item-megamenu">
                                    <a href="{{ action ('Site\PageController@home') }}">Главная</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ action ('Site\PageController@about') }}">О компании</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ action ('Site\PageController@schedule') }}">Расписание курсов</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ action ('Site\PageController@reviews') }}">Отзывы</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ action ('Site\PageController@contact') }}">Конакты</a>
                                </li>
                                <auth></auth>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <span class="mobile-navigation"><i class="fa fa-bars"></i></span>
                            <div class="box-control">
                                <form  class="box-search">
                                    <input type="text" class="search" placeholder="Поиск ...">
                                    <button class="button-search"><span class="pe-7s-search"></span></button>
                                </form>
                                <div class="box-settings">
                                    <span class="icon pe-7s-config"></span>
                                    <div class="settings-wrapper">
                                        <!--  <div class="setting-content">
                                                <div class="setting-option">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-heart icons"></i><span>Wishlist</span></a></li>
                                                        <li><a href="#"><i class="icon-user icons"></i><span> MyAccount</span></a></li>
                                                        <li><a href="#"><i class="icon-note icons"></i><span>Checkout</span></a></li>
                                                        <li><a href="#"><i class="icon-handbag icons"></i><span>Compare</span></a></li>
                                                        <li><a href="#"><i class="icon-lock-open icons"></i><span>Login / Register</span></a></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="logo">
                        <a href="#"><img src="images/logos/1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <ul class="category-menu">
                        <li>
                            <a href="#">
                                <img src="images/categorys/1.png" alt="">
                                Курсы
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/categorys/2.png" alt="">
                                Вебинары
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/categorys/3.png" alt="">
                                Тренинги
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/categorys/4.png" alt="">
                                Магазин
                            </a>
                        </li>
                        <li class="mini-cart">
                            <a class="cart-link" href="#">
                                <img src="images/categorys/5.png" alt="">
                                Корзина
                                <span class="count">3</span>
                            </a>
                            <div class="show-shopping-cart">
                                <h3 class="title">YOU HAVE <span class="text-primary">(3 ITEMS)</span> IN YOUR CART</h3>
                                <ul class="list-product">
                                    <li>
                                        <div class="thumb">
                                            <img src="images/products/1.png" alt="">
                                        </div>
                                        <div class="info">
                                            <h4 class="product-name"><a href="#">LONDON STAR SWEATSHIRT</a></h4>
                                            <span class="price">1x£375.00</span>
                                            <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <img src="images/products/1.png" alt="">
                                        </div>
                                        <div class="info">
                                            <h4 class="product-name"><a href="#">LONDON STAR SWEATSHIRT</a></h4>
                                            <span class="price">1x£375.00</span>
                                            <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="sub-total">
                                    Subtotal:£255.00
                                </div>
                                <div class="group-button">
                                    <a href="#" class="button">Shopping Cart</a>
                                    <a href="#" class="check-out button">CheckOut</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>