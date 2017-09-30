@extends('site.layouts.app')

{{--@section('title', $speaker->seo_title)--}}
{{--@section('description', $speaker->seo_description)--}}
{{--@section('keywords', $speaker->seo_keywords)--}}

@section('breadcrumbs')
       @include('site.layouts.breadcrumbs', [
           'title' => 'Докладчики',
           'icon' => 'mdi-account-switch',
           'breadcrumbs' => array(
               array('url' => '/', 'title' => 'Главная'),
               array('title' => 'Докладчики'),
           )])
@endsection

@section('content')
       <section class="section-top-66 section-bottom-110">
       <div class="shell">
              <h2><span class="big">Наша команда</span></h2>
              <p>У нас самая лучшая команда</p>
              <hr class="divider bg-mantis">
              <div class="range range-xs-center offset-top-66">
                     <div class="cell-sm-8 cell-lg-12">
                            <div class="range">
                                   @foreach($speakers as $speaker)
                                          <div class="cell-sm-6 cell-lg-3"><img class="img-circle img-responsive center-block" src="{{$speaker->image}}" width="140" height="140" alt="">
                                                 <div class="offset-top-24">
                                                        <h5 class="text-bold"><a href="{{$speaker->url}}">{{$speaker->first_name}} {{$speaker->last_name}}</a></h5>
                                                 </div>
                                                 <p class="offset-top-4 small text-bold text-malibu">{{$speaker->position}}</p>
                                                 <hr class="divider">

                                          </div>
                                   @endforeach
                            </div>
                     </div>
              </div>
       </div>
       <hr class="divider bg-mantis">
       {{ $speakers->links() }}
</section>
@endsection