<footer class="section-relative section-top-66 section-bottom-34 page-footer bg-gray-base context-dark">
    <div class="shell">
        <div class="range range-sm-center text-lg-left">
            <div class="cell-sm-12">
                <div class="range range-xs-center">

                    {{--Меню--}}
                    {{--<div class="cell-xs-10 cell-sm-6 offset-top-66 offset-md-top-0 text-xs-left cell-md-6 cell-lg-4 cell-lg-push-2 cell-md-push-1">--}}
                        {{--<h6 class="text-uppercase text-spacing-60 text-center text-md-left">Меню</h6>--}}

                        {{--<div class="offset-top-34 text-xs-center text-md-left">--}}
                            {{--<ul class="list list-marked list-footer">--}}
                                {{--<li><a href="{{ action ('Site\PageController@home') }}">Главная</a></li>--}}

                                {{--<li><a href="{{ action ('Site\PageController@about') }}">О компании</a></li>--}}

                                {{--<li><a href="{{ action ('Site\PageController@schedule') }}">Расписание курсов</a></li>--}}

                                {{--<li><a href="{{ action ('Site\SpeakerController@showSpeakers') }}">Докладчики</a></li>--}}

                                {{--<li><a href="{{ action ('Site\PageController@reviews') }}">Отзывы</a></li>--}}

                                {{--<li><a href="{{ action ('Site\PageController@contact') }}">Конакты</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--Контакты--}}
                    <div class="cell-xs-12 offset-top-66 cell-lg-3 cell-lg-push-1 offset-lg-top-0 cell-md-push-3">
                        <!-- Footer brand-->
                        <h6 class="text-uppercase">Контакты</h6>
                        <address class="contact-info offset-top-30 p">

                            @isset($settings->address)
                                <div>
                                    <dl>
                                        <dt class="text-white">Адрес:</dt>
                                        <dd class="text-dark reveal-lg-block">{{$settings->address}}</dd>
                                    </dl>
                                </div>
                            @endisset

                            @isset($settings->phone)
                                <div>
                                    <dl class="offset-top-0">
                                        <dt class="text-white">Телефон:</dt>
                                        <dd class="text-dark">{{$settings->phone}}</dd>
                                    </dl>
                                </div>
                            @endisset

                            @isset($settings->email)
                                    <div>
                                        <dl class="offset-top-0">
                                            <dt class="text-white">E-mail:</dt>
                                            <dd class="text-dark"><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></dd>
                                        </dl>
                                    </div>
                            @endisset
                        </address>
                    </div>

                    {{--Соцсети--}}
                    <div class="cell-xs-10 cell-sm-6 offset-top-66 offset-md-top-0 text-xs-left cell-md-6 cell-lg-4 cell-lg-push-2 cell-md-push-1">
                        <h6 class="text-uppercase text-spacing-60 text-center text-md-left">Мы в соцсетях</h6>

                        <div class="offset-top-34 text-xs-center text-md-left">
                            <ul class="list-inline">

                                @isset($settings->vk_url)
                                    <li><a class="icon fa fa-vk icon-xs icon-circle icon-darkest-filled" href="{{$settings->vk_url}}"></a></li>
                                @endisset

                                @isset($settings->ok_url)
                                    <li><a class="icon fa fa-odnoklassniki icon-xs icon-circle icon-darkest-filled" href="{{$settings->ok_url}}"></a></li>
                                @endisset

                                @isset($settings->fb_url)
                                    <li><a class="icon fa fa-facebook icon-xs icon-circle icon-darkest-filled" href="{{$settings->fb_url}}"></a></li>
                                @endisset

                                @isset($settings->instagram_url)
                                    <li><a class="icon fa fa-instagram icon-xs icon-circle icon-darkest-filled" href="{{$settings->instagram_url}}"></a></li>
                                @endisset

                                @isset($settings->twitter_url)
                                    <li><a class="icon fa fa-twitter icon-xs icon-circle icon-darkest-filled" href="{{$settings->twitter_url}}"></a></li>
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shell offset-top-50">
        <p class="small text-darker">ООО "Образ" &copy; <span class="copyright-year"></span> | <a href="http://devself.ru">Разработка сайта</a>
            <!-- {%FOOTER_LINK}-->
        </p>
    </div>
</footer>