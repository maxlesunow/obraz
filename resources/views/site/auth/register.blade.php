@extends('site.layouts.app')

@section('title', 'Регистрация')

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Войти',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Авторизация | Регистрация'),
        )])
@endsection

@section('content')
<!--Section Login Register-->
<section class="section-98 section-sm-110 section-bottom-66">
    <div class="shell">
        <h2 class="text-bold">Sign In</h2>
        <hr class="divider bg-mantis">
        <div class="offset-sm-top-66">
            <!-- Responsive-tabs-->
            <div class="responsive-tabs responsive-tabs-classic" data-type="horizontal">
                <ul class="resp-tabs-list tabs-1 text-center tabs-group-default" data-group="tabs-group-default">
                    <li>Вход</li>
                    <li>Регистрация</li>
                    <!-- <li>Восстановление</li> -->
                </ul>
                <div class="resp-tabs-container text-left tabs-group-default" data-group="tabs-group-default">
                    <div>
                        <div class="range range-xs-center section-34">
                            <div class="cell-xs-8 cell-sm-6 cell-md-4">
                                <login></login>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="range range-xs-center section-34">
                            <div class="cell-xs-8 cell-sm-6 cell-md-4">
                                <!-- <register></register> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div>
                        <div class="range range-xs-center section-34">
                            <div class="cell-xs-8 cell-sm-6 cell-md-4">
                                <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                    <div class="form-group">
                                        <label class="form-label form-label-outside" for="form-register-username">Name:</label>
                                        <input class="form-control bg-white" id="form-register-username" type="text" name="name" data-constraints="@Required">
                                    </div>
                                    <div class="form-group offset-top-24">
                                        <label class="form-label form-label-outside" for="form-register-password">Password:</label>
                                        <input class="form-control bg-white" id="form-register-password" type="text" name="pass" data-constraints="@Required">
                                    </div>
                                    <div class="offset-top-24">
                                        <button class="btn btn-primary btn-block" type="submit">create an account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection