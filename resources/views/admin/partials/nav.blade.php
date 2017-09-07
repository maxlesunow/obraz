<div class="navbar navbar-inverse">
    <div class="navbar-header">
        {{--<a class="navbar-brand" href="/dashboard"><img src="/images/logo_light.png" alt=""></a>--}}

        <ul class="nav navbar-nav">
            <li><a href="{{ action ('AdminController@index') }}"><i class="icon-address-book position-left"></i> Заявки</a></li>
            <li><a href="{{ action ('AdminController@index') }}"><i class="icon-stack2 position-left"></i> Курсы</a></li>
            <li><a href="{{ action ('UserController@index') }}"><i class="icon-users4 position-left"></i> Пользователи</a></li>
            <li><a href="{{ action ('AdminController@index') }}"><i class="icon-credit-card position-left"></i> Оплаты</a></li>
            <li><a href="{{ action ('SpeakerController@index') }}"><i class="icon-profile position-left"></i> Докладчики</a></li>
            <li><a href="{{ action ('AdminController@index') }}"><i class="icon-info22 position-left"></i> Страницы</a></li>
            <li><a href="{{ action ('AdminController@index') }}"><i class="icon-question3 position-left"></i> Отзывы</a></li>
            {{--<li><a href="{{ action ('EmailNewsletterController@index') }}"><i class=" icon-envelop2 position-left"></i> E-mail рассылка</a></li>--}}
            {{--<li><a href="{{ action ('SubscriberController@index') }}"><i class="icon-users position-left"></i> Подписчики</a></li>--}}
            {{--<li><a href="{{ action ('MailingListController@index') }}"><i class="icon-address-book position-left"></i> Списки рассылки</a></li>--}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-wrench2 position-left"></i> Параметры <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ action ('UserController@indexAdmin') }}"><i class="icon-user-tie position-left"></i> Администраторы</a></li>
                    {{--<li><a href="{{ action ('SiteController@index') }}"><i class="icon-iphone position-left"></i> Группы курсов</a></li>--}}
                    {{--<li><a href="{{ action ('SiteController@index') }}"><i class="icon-envelop2 position-left"></i> Типы курсов</a></li>--}}
                </ul>
            </li>
        </ul>
    </div>

    <ul class="nav navbar-nav navbar-right">
        {{--<p class="navbar-text"><span class="label label-success">SMS: {{ $sms_balance }} Р - {{ $sms_limit }} шт</span></p>--}}
        {{--<p class="navbar-text"><span class="label label-info">Email: {{ $sms_balance }} Р - {{ $sms_limit }} шт</span></p>--}}


        <li class="dropdown dropdown-user">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <span>{{ Auth::user()->full_name() }}</span>
                <i class="caret"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> Выйти</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </li>
    </ul>
</div>