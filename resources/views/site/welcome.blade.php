<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Boutique - eCommerce</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/chosen.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">--}}
</head>
<body class="home">
<div id="app">
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
                                        <a href="index1.html">Главная</a>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">О компании</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Курсы</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Вебинары</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Магазин</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Отзывы</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="blogs.html">Новости</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="blogs.html">Список новостей</a></li>
                                            <li><a href="blogpost.html">Одна новость</a></li>
                                        </ul> -->
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
    <!-- ./Header -->
    <div class="container">
        <!-- Home slide -->
        <div class="home-slide1 owl-carousel nav-style1" data-items="1" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true">
            <img src="images/slides/1.jpg" alt="">
            <img src="images/slides/2.jpg" alt="">
            <img src="images/slides/3.jpg" alt="">
        </div>
        <!-- ./Home slide -->
        <div class="margin-top-40 margin-bottom-40">
            <div class="row">
                <div class="col-sm-4" style="text-align: right;">
                    <img style="margin-right: 20px;" class="" src="images/logos/1.png" alt="">
                </div>
                <div class="col-sm-7">
                    <blockquote>Задача организации, в особенности же новая модель организационной деятельности требуют от нас анализа систем массового участия. Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности позволяет оценить значение направлений прогрессивного развития. Товарищи! </blockquote>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-border">
                <p>ЗАПИШИСЬ НА "САМЫЙ ЛУЧШИЙ КУРС" ПРЯМО СЕЙЧАС И ПОЛУЧИ СКИДКУ 20% | КОЛИЧЕСТВО УЧАСТНИКОВ ОГРАНИЧЕНО</p>
            </div>
        </div>
        <div class="margin-top-50">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="banner-product">
                                <img src="images/products/17.jpg" alt="">
                                <h3 class="text">Первый популярный товар</h3>
                                <span class="price">
                                    <ins>125.00 Р</ins>
                                    <del>150.00 Р</del>
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="banner-product">
                                <img src="images/products/27.jpg" alt="">
                                <h3 class="text">Второй популярный товар</h3>
                                <span class="price">125.00 Р</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="banner-product">
                                <img src="images/products/28.jpg" alt="">
                                <h3 class="text">Третий популярный товар</h3>
                                <span class="price">125.00 Р</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#" class="banner-product">
                        <img src="images/b/3.jpg" alt="">
                        <h3 class="text">Четвертый популярный товар</h3>
                        <span class="price">1205.00 Р</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="margin-top-30 section-lasttest-blog">
            <div class="section-title text-center"><h3>ТЕКСТ НА ГЛАВНОЙ</h3></div>
            <div class="blog-short-desc">
                <p>Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности в значительной степени обуславливает создание форм развития. Не следует, однако забывать, что консультация с широким активом требуют определения и уточнения направлений прогрессивного развития. Товарищи! дальнейшее развитие различных форм деятельности требуют от нас анализа позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что консультация с широким активом требуют от нас анализа существенных финансовых и административных условий. С другой стороны новая модель организационной деятельности требуют от нас анализа модели развития.</p>

                <p>Равным образом постоянный количественный рост и сфера нашей активности позволяет выполнять важные задания по разработке направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что реализация намеченных плановых заданий в значительной степени обуславливает создание форм развития. Повседневная практика показывает, что рамки и место обучения кадров в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Идейные соображения высшего порядка, а также консультация с широким активом требуют от нас анализа направлений прогрессивного развития.</p>

                <p>Разнообразный и богатый опыт рамки и место обучения кадров влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Разнообразный и богатый опыт реализация намеченных плановых заданий способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации новых предложений.</p>
            </div>
        </div>
        <div class="margin-top-30 section-lasttest-blog">
            <div class="section-title text-center"><h3>НОВОСТИ</h3></div>
            <div class="lastest-blog owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":2}}'>
                <div class="item-blog">
                    <div class="left">
                        <div class="blog-date">
                            <span class="day">29</span>
                            <span class="month">/АВГУСТА</span><br>
                            <span class="year">2017</span>
                        </div>
                        <h3 class="blog-title"><a href="#">Заголовок первой новости</a></h3>
                        <div class="meta">
                            <span class="author">Павел Иванов</span>
                            <span class="comment"><i class="fa fa-comment"></i> 36 комментариев</span>
                        </div>
                    </div>
                    <div class="right">
                        <a class="banner-border" href="#"><img src="images/blogs/1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="item-blog">
                    <div class="left">
                        <div class="blog-date">
                            <span class="day">1</span>
                            <span class="month">/СЕНТЯБРЯ</span><br>
                            <span class="year">2017</span>
                        </div>
                        <h3 class="blog-title"><a href="#">Заголовок второй новости</a></h3>
                        <div class="meta">
                            <span class="author">Иван Петров</span>
                            <span class="comment"><i class="fa fa-comment"></i> 36 комментариев</span>
                        </div>
                    </div>
                    <div class="right">
                        <a class="banner-border" href="#"><img src="images/blogs/2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="item-blog">
                    <div class="left">
                        <div class="blog-date">
                            <span class="day">7</span>
                            <span class="month">/SEP</span><br>
                            <span class="year">2015</span>
                        </div>
                        <h3 class="blog-title"><a href="#">Заголовок третьей новости/a></h3>
                        <div class="meta">
                            <span class="author">John Doe</span>
                            <span class="comment"><i class="fa fa-comment"></i> 36 комментариев</span>
                        </div>
                    </div>
                    <div class="right">
                        <a class="banner-border" href="#"><img src="images/blogs/1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-brand-slide">
            <div class="brands-slide owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="60" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                <a href="#"><img src="images/brands/brand1.png" alt=""></a>
                <a href="#"><img src="images/brands/brand2.png" alt=""></a>
                <a href="#"><img src="images/brands/brand3.png" alt=""></a>
                <a href="#"><img src="images/brands/brand4.png" alt=""></a>
                <a href="#"><img src="images/brands/brand5.png" alt=""></a>
            </div>
        </div>
        <div class="margin-top-60 margin-bottom-30">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-origami28"></i></div>
                        <div class="content">
                            <h4 class="title">Баннер 1 (если нужен)</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-curvearrows9"></i></div>
                        <div class="content">
                            <h4 class="title">Баннер 2 (если нужен)</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-headphones54"></i></div>
                        <div class="content">
                            <h4 class="title">Баннер 3 (если нужен)</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row flex-flow">
                    <div class="col-sm-12 col-md-4 footer-sidebar">
                        <div class="widget contact-info">
                            <!-- <span class="text-primary PlayfairDisplay">Talk to Us Now !</span> -->
                            <h3 class="widget-title">КОНТАКТЫ</h3>
                            <div class="content">
                                <p class="address">30800, Россия, г. Белгород, проспект Богдана-Хмельницкого 272, оф 3</p>
                                <p class="phone"><i class="fa fa-phone"></i> (+800) 6868 2268</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 footer-sidebar">
                        <div class="widget our-service">
                            <!-- <span class="text-primary PlayfairDisplay">Talk to Us Now !</span> -->
                            <h3 class="widget-title">ЕЩЕ МЕНЮ</h3>
                            <div class="content">
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Custom Service</a></li>
                                    <li><a href="#">Terms & Condition</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 footer-sidebar">
                        <div class="widget widget_social">
                            <!-- <span class="text-primary PlayfairDisplay">Talk to Us Now !</span> -->
                            <h3 class="widget-title">МЫ В СОЦСЕТЯХ</h3>
                            <div class="content">
                                <div class="social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="payment">
                    <div class="head"><span>МЫ ПРИНИМАЕМ</span><span class="PlayfairDisplay">Онлайн-оплата</span></div>
                    <div class="list">
                        <a href="#" class="item"><img src="images/payments/1.png" alt=""></a>
                        <a href="#" class="item"><img src="images/payments/2.png" alt=""></a>
                        <a href="#" class="item"><img src="images/payments/3.png" alt=""></a>
                        <a href="#" class="item"><img src="images/payments/4.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
    {{--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/bootstrap.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/owl.carousel.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/chosen.jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/Modernizr.js"></script>--}}
    {{--<script type="text/javascript" src="js/jquery-ui.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/lightbox.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>--}}
    {{--<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/masonry.js"></script>--}}
    {{--<script type="text/javascript" src="js/functions.js"></script>--}}
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

{{--  <script src="{{ asset('js/functions.js') }}"></script>  --}}

</body>
</html>