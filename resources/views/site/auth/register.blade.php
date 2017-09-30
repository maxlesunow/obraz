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
                    <li>Login</li>
                    <li>Registration</li>
                </ul>
                <div class="resp-tabs-container text-left tabs-group-default" data-group="tabs-group-default">
                    <div>
                        <div class="range range-xs-center section-34">
                            <div class="cell-xs-8 cell-sm-6 cell-md-4">
                                <!-- RD Mailform-->
                                <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                    <div class="form-group">
                                        <label class="form-label form-label-outside" for="form-login-username">Username or e-mail:</label>
                                        <input class="form-control bg-white" id="form-login-username" type="text" name="username" data-constraints="@Required">
                                    </div>
                                    <div class="form-group offset-top-24">
                                        <label class="form-label form-label-outside" for="form-login-password">Password:</label>
                                        <input class="form-control bg-white" id="form-login-password" type="text" name="pass" data-constraints="@Required">
                                    </div>
                                    <div class="offset-top-24">
                                        <button class="btn btn-primary btn-block" type="submit">sign in</button>
                                    </div>
                                </form>
                                <div class="offset-top-30 text-center">
                                    <p>or enter with</p>
                                    <ul class="list-inline">
                                        <li><a class="icon fa fa-facebook icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                                        <li><a class="icon fa fa-twitter icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                                        <li><a class="icon fa fa-google-plus icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="range range-xs-center section-34">
                            <div class="cell-xs-8 cell-sm-6 cell-md-4">
                                <!-- RD Mailform-->
                                <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                    <div class="form-group">
                                        <label class="form-label form-label-outside" for="form-register-username">Name:</label>
                                        <input class="form-control bg-white" id="form-register-username" type="text" name="name" data-constraints="@Required">
                                    </div>
                                    <div class="form-group offset-top-24">
                                        <label class="form-label form-label-outside" for="form-register-email">Email:</label>
                                        <input class="form-control bg-white" id="form-register-email" type="text" name="email" data-constraints="@Required @Email">
                                    </div>
                                    <div class="form-group offset-top-24">
                                        <label class="form-label form-label-outside" for="form-register-password">Password:</label>
                                        <input class="form-control bg-white" id="form-register-password" type="text" name="pass" data-constraints="@Required">
                                    </div>
                                    <div class="form-group offset-top-24">
                                        <label class="form-label form-label-outside" for="form-register-confirm-password">Confirm Password:</label>
                                        <input class="form-control bg-white" id="form-register-confirm-password" type="text" name="confirmpass" data-constraints="@Required">
                                    </div>
                                    <div class="offset-top-24">
                                        <button class="btn btn-primary btn-block" type="submit">create an account</button>
                                    </div>
                                </form>
                                <div class="offset-top-30 text-center">
                                    <p>or enter with</p>
                                    <ul class="list-inline">
                                        <li><a class="icon fa fa-facebook icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                                        <li><a class="icon fa fa-twitter icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                                        <li><a class="icon fa fa-google-plus icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection