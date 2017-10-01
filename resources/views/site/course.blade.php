@extends('site.layouts.app')

@section('title', $course->seo_title)
@section('description', $course->seo_description)
@section('keywords', $course->seo_keywords)



@section('breadcrumbs')
       @include('site.layouts.breadcrumbs', [
           'title' =>  $course->name,
           'icon' => 'mdi-account-multiple-outline',
           'breadcrumbs' => array(
               array('url' => '/', 'title' => 'Главная'),
               array('url' => '/shedule', 'title' => 'Расписание курсов'),
               array('title' => $course->name),
           )])
@endsection

@section('content')
       <!--Section Contact Info-->
       {{--<section class="bg-lighter section-66">--}}
              {{--<div class="shell-wide">--}}
                     {{--<div class="range range-xs-center text-sm-left">--}}
                            {{--<div class="cell-xs-10 cell-sm-8 cell-md-12">--}}
                                   {{--<div class="range range-xs-center">--}}
                                          {{--<div class="cell-xs-6 cell-md-3 cell-xl-2">--}}
                                                 {{--<div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">--}}
                                                        {{--<div class="unit-left"><span class="icon icon-xs mdi mdi-phone text-primary" style="font-size: 26px;"></span></div>--}}
                                                        {{--<div class="unit-body">--}}
                                                               {{--<h6>Где?</h6>--}}
                                                               {{--<div class="p">{{$course->address}}</div>--}}
                                                        {{--</div>--}}
                                                 {{--</div>--}}
                                          {{--</div>--}}
                                          {{--<div class="cell-xs-6 cell-md-3 cell-xl-2 offset-top-50 offset-xs-top-0">--}}
                                                 {{--<div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">--}}
                                                        {{--<div class="unit-left"><span class="icon icon-xs mdi mdi-email-open text-primary" style="font-size: 26px;"></span></div>--}}
                                                        {{--<div class="unit-body">--}}
                                                               {{--<h6>Когда?</h6>--}}
                                                               {{--<div class="p">{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%d %B %Y')}}</div>--}}
                                                        {{--</div>--}}
                                                 {{--</div>--}}
                                          {{--</div>--}}
                                          {{--<div class="cell-xs-6 cell-md-3 cell-xl-2 offset-top-50 offset-md-top-0">--}}
                                                 {{--<div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">--}}
                                                        {{--<div class="unit-left"><span class="icon icon-xs mdi mdi-map text-primary" style="font-size: 26px;"></span></div>--}}
                                                        {{--<div class="unit-body">--}}
                                                               {{--<h6>Во сколько?</h6>--}}
                                                               {{--<div class="p">Регистрация: {{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%H:%M')}}</div>--}}
                                                               {{--<div class="p">Начало: {{ Carbon\Carbon::parse($course->time_register)->formatLocalized('%H:%M')}}</div>--}}
                                                        {{--</div>--}}
                                                 {{--</div>--}}
                                          {{--</div>--}}
                                          {{--<div class="cell-xs-6 cell-md-3 cell-xl-2 offset-top-50 offset-md-top-0">--}}
                                                 {{--<div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">--}}
                                                        {{--<div class="unit-left"><span class="icon icon-xs mdi mdi-timelapse text-primary" style="font-size: 26px;"></span></div>--}}
                                                        {{--<div class="unit-body">--}}
                                                               {{--<h6>Сколько стоит?</h6>--}}
                                                               {{--<div class="p">{{$course->cost}} Руб</div>--}}
                                                        {{--</div>--}}
                                                 {{--</div>--}}
                                          {{--</div>--}}
                                   {{--</div>--}}
                            {{--</div>--}}
                     {{--</div>--}}
              {{--</div>--}}
       {{--</section>--}}

       <section class="bg-black-haze">
              <div class="section-top-66">
                     <div class="shell">
                            <h1>{{$course->name}}</h1>
                            <hr class="divider bg-mantis">
                            <div class="range range-xs-center range-md-left range-md-bottom">
                                   <div class="cell-md-7 cell-lg-6 cell-lg-preffix-1  reveal-md-block">

                                          <div class="offset-top-66 offset-lg-top-34">
                                                 <!-- Icon Box Type 2-->
                                                 <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                        <div class="unit-left"><span class="icon text-gray mdi mdi-newspaper"></span></div>
                                                        <div class="unit-body">
                                                               <h4 class="text-bold text-malibu offset-sm-top-14">Где будет проходить?</h4>
                                                               <p>We know how important it is for you to maintain your schedule, that’s why we do everything to fit it. Our team works on your project in multiple threads.</p>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="offset-top-66 offset-lg-top-34">
                                                 <!-- Icon Box Type 2-->
                                                 <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                        <div class="unit-left"><span class="icon text-gray mdi mdi-headset"></span></div>
                                                        <div class="unit-body">
                                                               <h4 class="text-bold text-malibu offset-sm-top-14">Во сколько начало?</h4>
                                                               <p>Our support team is online 24/7, and is ready to help you with any design - related issue.</p>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="offset-top-66 offset-lg-top-34">
                                                 <!-- Icon Box Type 2-->
                                                 <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                        <div class="unit-left"><span class="icon text-gray mdi mdi-headset"></span></div>
                                                        <div class="unit-body">
                                                               <h4 class="text-bold text-malibu offset-sm-top-14">Во сколько регистрация?</h4>
                                                               <p>Our support team is online 24/7, and is ready to help you with any design - related issue.</p>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="offset-top-66 offset-lg-top-34">
                                                 <!-- Icon Box Type 2-->
                                                 <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                        <div class="unit-left"><span class="icon text-gray mdi mdi-headset"></span></div>
                                                        <div class="unit-body">
                                                               <h4 class="text-bold text-malibu offset-sm-top-14">Сколько стоит?</h4>
                                                               <p>Our support team is online 24/7, and is ready to help you with any design - related issue.</p>
                                                        </div>
                                                 </div>
                                          </div>

                                   </div>


                                   <div class="cell-xs-10 cell-sm-8 cell-md-5 cell-lg-4">
                                          <div class="section-bottom-66 section-md-bottom-41">
                                                 <h3>Записаться онлайн</h3>
                                                 <form class="well-lg bg-white shadow-drop-md text-left rd-mailform" data-form-output="form-output-global" data-form-type="order" method="post" action="bat/rd-mailform.php">
                                                        <p>Заполните форму и получите билет на курс прямо сейчас!</p>
                                                        <div class="form-group offset-top-30">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-1">Фамилия:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-1" type="text" data-constraints="@Required"/>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-1">Имя:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-1" type="text" data-constraints="@Required"/>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-1">Отчество:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-1" type="text" data-constraints="@Required"/>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-2">E-Mail:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-2" type="text" data-constraints="@Required @Email"/>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-3">Телефон:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-3" type="text" data-constraints="@Required"/>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-3">Способ оплаты:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-3" type="text" data-constraints="@Required"/>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="form-label form-label-sm" for="call-to-action-label-group-3">Комментарий:</label>
                                                               <input class="form-control input-sm form-control-impressed form-validation-inside" id="call-to-action-label-group-3" type="text" data-constraints="@Required"/>
                                                        </div>
                                                        <button class="btn btn-block btn-primary offset-top-20" type="submit">Записаться на курс</button>
                                                 </form>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
       </section>


       @include('site.partials.text',
           [
               'name'=> $course->name,
               'description'=> $course->description,
           ])

       @include('site.partials.speakers',
           [
               'name'=> 'Докладчики курса',
               'description'=> 'Докладчики курса знают материал лучше всех',
               'speakers' => $course->speakers
           ])
@endsection