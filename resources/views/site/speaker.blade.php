@extends('site.layouts.app')

@section('title', $speaker->seo_title)
@section('description', $speaker->seo_description)
@section('keywords', $speaker->seo_keywords)

@section('breadcrumbs')
       @include('site.layouts.breadcrumbs', [
           'title' => $speaker->full_name,
           'icon' => 'mdi-account-box-outline',
           'breadcrumbs' => array(
               array('url' => '/', 'title' => 'Главная'),
               array('url' => '/speakers', 'title' => 'Докладчики'),
               array('title' => $speaker->full_name),
           )])
@endsection

@section('content')
       <section class="section-top-50 section-sm-50">
              <div class="shell">
                     <div class="range range-xs-center">
                            <div class="cell-xs-10 cell-sm-5 cell-lg-4 text-md-left">
                                   <!-- Member Block Type 5-->
                                   <div class="member-block-type-5 inset-md-right-30">
                                          <img class="img-responsive center-block" src="{{$speaker->image}}" width="437" height="437" alt="">
                                   </div>
                            </div>
                            <div class="cell-xs-10 text-sm-left cell-sm-7 cell-lg-8 offset-top-24 offset-sm-top-0">
                                   <h1>{{$speaker->full_name}}</h1>
                                   <div>
                                          <h3 class="font-default text-italic text-regular">{{$speaker->position}}</h3>
                                   </div>

                                   <hr class="divider reveal-inline-block bg-mantis">

                                   <div class="offset-top-24">{!! $speaker->description !!}</div>
                            </div>
                     </div>
              </div>
       </section>


       @include('site.partials.courses',
           [
               'name'=> 'Ближайшие события докладчика',
               'courses' => $speaker->courses
           ])

@endsection