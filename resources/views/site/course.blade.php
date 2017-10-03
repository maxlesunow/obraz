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

       <section class="section parallax-container" data-parallax-img="/images/bg-03-1920x1425.jpg">
              <div class="parallax-content">
                     <div class="section-top-66">
                            <div class="shell">
                                   <h1>{{$course->name}}</h1>
                                   <hr class="divider bg-mantis">
                                   <div class="range range-xs-center range-md-left range-md-bottom">
                                          <div class="cell-md-7 cell-lg-6 cell-lg-preffix-1 reveal-md-block course-options section-bottom-66">

                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-headset"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Тип курса</h4>
                                                                      <h6>{{$course->course_type->name}}</h6>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-tag-text-outline"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Группа курса</h4>
                                                                      <h6>{{$course->course_group->name}}</h6>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-map-marker-radius"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Где будет проходить?</h4>
                                                                      <h6>{{$course->address}}</h6>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-calendar-clock"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Во сколько начало?</h4>
                                                                      <h6>{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%d %B %Y %H:%M')}}</h6>
                                                                      <h6>{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%A')}}</h6>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-timetable"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Во сколько регистрация?</h4>
                                                                      <h6>{{ Carbon\Carbon::parse($course->time_register)->formatLocalized('%d %B %Y %H:%M')}}</h6>
                                                                      <h6>{{ Carbon\Carbon::parse($course->time_register)->formatLocalized('%A')}}</h6>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-account-multiple"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Кто докладчики?</h4>
                                                                      @foreach($course->speakers as $speaker)
                                                                             <h6><a href="{{ $speaker->url}}">{{ $speaker->full_name}}</a></h6>
                                                                      @endforeach
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="offset-top-14">
                                                        <!-- Icon Box Type 2-->
                                                        <div class="unit unit-sm unit-sm-horizontal text-sm-left">
                                                               <div class="unit-left"><span class="icon text-gray mdi mdi-currency-rub"></span></div>
                                                               <div class="unit-body">
                                                                      <h4 class="text-bold text-malibu">Сколько стоит?</h4>
                                                                      <div class="product-price h3">
                                                                             <span class="product-price-new text-bold text-primary">{{$course->cost}} </span>
                                                                      </div>
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