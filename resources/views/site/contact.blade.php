@extends('site.layouts.app')

@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)


@section('breadcrumbs')
       @include('site.layouts.breadcrumbs', [
           'title' => $page->title,
           'icon' => 'mdi-map-marker-circle',
           'breadcrumbs' => array(
               array('url' => '/', 'title' => 'Главная'),
               array('title' => $page->title),
           )])
@endsection

@section('content')

       <section class="bg-lighter section-66">
              <div class="shell-wide">
                     <div class="range range-xs-center text-sm-left">
                            <div class="cell-xs-10 cell-sm-8 cell-md-12">
                                   <div class="range range-xs-center">
                                          <div class="cell-xs-6 cell-md-3 cell-xl-2">
                                                 <div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">
                                                        <div class="unit-left"><span class="icon icon-xs mdi mdi-phone text-primary" style="font-size: 26px;"></span></div>
                                                        <div class="unit-body">
                                                               <h6>Телефон</h6>
                                                               <div class="p"><a class="reveal-block" href="callto:1-800-1234-567">1-800-1234-567</a><a class="reveal-block" href="callto:1-800-6547-987">1-800-6547-987</a></div>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="cell-xs-6 cell-md-3 cell-xl-2 offset-top-50 offset-xs-top-0">
                                                 <div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">
                                                        <div class="unit-left"><span class="icon icon-xs mdi mdi-email-open text-primary" style="font-size: 26px;"></span></div>
                                                        <div class="unit-body">
                                                               <h6>E-mail</h6>
                                                               <div class="p"><a class="reveal-block" href="mailto:info@demolink.org">info@demolink.org</a></div>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="cell-xs-6 cell-md-3 cell-xl-2 offset-top-50 offset-md-top-0">
                                                 <div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">
                                                        <div class="unit-left"><span class="icon icon-xs mdi mdi-map text-primary" style="font-size: 26px;"></span></div>
                                                        <div class="unit-body">
                                                               <h6>Адрес</h6>
                                                               <address class="contact-info">213, New Lenox, Chicago, IL 60606</address>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="cell-xs-6 cell-md-3 cell-xl-2 offset-top-50 offset-md-top-0">
                                                 <div class="unit unit-spacing-xs unit-sm unit-sm-horizontal">
                                                        <div class="unit-left"><span class="icon icon-xs mdi mdi-timelapse text-primary" style="font-size: 26px;"></span></div>
                                                        <div class="unit-body">
                                                               <h6>Время работы</h6>
                                                               <div>
                                                                      <p>8:00 – 19:00 Mon – Fri</p>
                                                               </div>
                                                               <p class="offset-top-0">9:00 – 17:00 Sat</p>
                                                        </div>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
       </section>

       @include('site.partials.text',
           [
               'name'=> $page->title,
               'description'=> $page->text,
           ])


       <section>
              <!-- RD Google Map-->
              <div class="rd-google-map">
                     <div class="rd-google-map__model" id="rd-google-map" data-zoom="14" data-y="50.5767715" data-x="36.5610575" data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;administrative.locality&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;},{&quot;saturation&quot;:&quot;-65&quot;},{&quot;lightness&quot;:&quot;45&quot;},{&quot;gamma&quot;:&quot;1.78&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit.line&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:&quot;-33&quot;},{&quot;lightness&quot;:&quot;22&quot;},{&quot;gamma&quot;:&quot;2.08&quot;}]},{&quot;featureType&quot;:&quot;transit.station.airport&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;gamma&quot;:&quot;2.08&quot;},{&quot;hue&quot;:&quot;#ffa200&quot;}]},{&quot;featureType&quot;:&quot;transit.station.airport&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit.station.rail&quot;,&quot;elementType&quot;:&quot;labels.text&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit.station.rail&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;},{&quot;saturation&quot;:&quot;-55&quot;},{&quot;lightness&quot;:&quot;-2&quot;},{&quot;gamma&quot;:&quot;1.88&quot;},{&quot;hue&quot;:&quot;#ffab00&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#bbd9e5&quot;},{&quot;visibility&quot;:&quot;simplified&quot;}]}]"></div>
                     <ul class="rd-google-map__locations">
                            <li data-y="50.5767715" data-x="36.5610575">
                                   <p>г.Белгород, ул. Толстого, д. 55</p>
                            </li>
                     </ul>
              </div>
       </section>
@endsection