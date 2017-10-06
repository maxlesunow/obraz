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
                    <div class="rd-navbar-brand"><a href="/"><img style='margin-top: -5px;margin-left: -15px;' height='46' src='/images/logos/logo-small.png' alt=''/></a></div>
                </div>
                <div class="rd-navbar-menu-wrap">
                    <div class="rd-navbar-nav-wrap">
                        <div class="rd-navbar-mobile-scroll">
                            <!--Navbar Brand Mobile-->
                            <div class="rd-navbar-mobile-brand"><a href="/"><img style='margin-top: -5px;margin-left: -15px;' height='46' src='/images/logos/logo-small.png' alt=''/></a></div>
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

                                </li>

                                <li><a href="{{ action ('Site\PageController@about') }}"><span>О компании</span></a></li>

                                <li><a href="{{ action ('Site\PageController@schedule') }}"><span>Расписание курсов</span></a></li>

                                <li><a href="{{ action ('Site\SpeakerController@showSpeakers') }}"><span>Докладчики</span></a></li>

                                <li><a href="{{ action ('Site\PageController@reviews') }}"><span>Отзывы</span></a></li>

                                <li><a href="{{ action ('Site\PageController@contact') }}"><span>Конакты</span></a></li>

                                @guest
                                    <li><a href="{{ action ('Auth\RegisterController@showRegistrationForm') }}"><span>Войти</span></a></li>
                                @else
                                    @if(Auth::user()->role->name == 'admin')
                                        <li><a target="_blank" href="{{ action ('AdminController@index') }}"><span>Админпанель</span></a></li>
                                        <li>
                                            <a href="{{ action ('Auth\LoginController@logout') }}"
                                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                Выйти
                                            </a>

                                            <form id="logout-form" action="{{ action ('Auth\LoginController@logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    @else
                                        <li><a href="#"><span>Личный кабинет</span></a>
                                            <ul class="rd-navbar-dropdown">
                                                <li><a href="#"><span class="text-middle">Мои данные</span></a></li>
                                                <li><a href="#"><span class="text-middle">Мои курсы</span></a></li>
                                                <li><a href="#"><span class="text-middle">Мои оплаты</span></a></li>
                                                <li>
                                                    <a href="{{ action ('Auth\LoginController@logout') }}"
                                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                        Выйти
                                                    </a>

                                                    <form id="logout-form" action="{{ action ('Auth\LoginController@logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                        @endguest


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
                </div>
            </div>
        </nav>
    </div>

    @yield('slider')

</header>