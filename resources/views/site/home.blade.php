@extends('site.layouts.app')

@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('content')
    <section class="offset-top-66 offset-md-top-66">
        <div class="shell">
            <h2>Консалтинговое пространство &laquo;Образ&raquo;</h2>
            <p>Это дружеское
                объединение, в истоках которого стоят специалисты, добившиеся
                успеха в актуальных направлениях деятельности с нуля, проходя
                иерархию развития и набирая опыт только с положительной динамикой.</p>
            <div class="range range-md-middle offset-top-34">
                <div class="cell-md-4 cell-md-push-1"><img class="center-block img-responsive" src="images/logos/logo-full.png" alt="" height="470"></div>
                <div class="cell-sm-8 cell-sm-preffix-2 cell-md-4 cell-md-preffix-0 text-md-right">
                    <div class="unit unit-spacing-sm unit-inverse unit-md unit-md-horizontal">
                        <div class="unit-body">
                            <h4 class="text-uppercase text-bold offset-md-top-20">Стоматология</h4>
                            <p>The information should be not only well-organized and easy to read. thus making the process enjoyable.</p>
                        </div>
                        <div class="unit-right"><span class="icon icon-circle icon-lg icon-bordered icon-picton-blue mdi mdi-message-text-outline"></span></div>
                    </div>
                    <div class="unit unit-spacing-sm unit-inverse unit-md unit-md-horizontal offset-top-50 offset-md-top-30">
                        <div class="unit-body">
                            <h4 class="text-uppercase text-bold offset-md-top-20">Маникюр</h4>
                            <p>The information should be not only well-organized and easy to read. thus making the process enjoyable.</p>
                        </div>
                        <div class="unit-right"><span class="icon icon-circle icon-lg icon-bordered icon-picton-blue mdi mdi-image-filter"></span></div>
                    </div>
                    <div class="unit unit-spacing-sm unit-inverse unit-md unit-md-horizontal offset-top-50 offset-md-top-30">
                        <div class="unit-body">
                            <h4 class="text-uppercase text-bold offset-md-top-20">Педикюр</h4>
                            <p>The information should be not only well-organized and easy to read. thus making the process enjoyable.</p>
                        </div>
                        <div class="unit-right"><span class="icon icon-circle icon-lg icon-bordered icon-picton-blue mdi mdi-emoticon-happy"></span></div>
                    </div>
                </div>
                <div class="cell-sm-8 cell-sm-preffix-2 cell-md-4 cell-md-preffix-0 text-md-left cell-md-push-1 offset-top-50 offset-md-top-0">
                    <div class="unit unit-spacing-sm unit-md unit-md-horizontal">
                        <div class="unit-left"><span class="icon icon-circle icon-lg icon-bordered icon-picton-blue mdi mdi-cellphone-link"></span></div>
                        <div class="unit-body">
                            <h4 class="text-uppercase text-bold offset-md-top-20">Курсы</h4>
                            <p>The information should be not only well-organized and easy to read. thus making the process enjoyable.</p>
                        </div>
                    </div>
                    <div class="unit unit-spacing-sm unit-md unit-md-horizontal offset-top-50 offset-md-top-30">
                        <div class="unit-left"><span class="icon icon-circle icon-lg icon-bordered icon-picton-blue mdi mdi-television-guide"></span></div>
                        <div class="unit-body">
                            <h4 class="text-uppercase text-bold offset-md-top-20">Тренинги</h4>
                            <p>The information should be not only well-organized and easy to read. thus making the process enjoyable.</p>
                        </div>
                    </div>
                    <div class="unit unit-spacing-sm unit-md unit-md-horizontal offset-top-50 offset-md-top-30">
                        <div class="unit-left"><span class="icon icon-circle icon-lg icon-bordered icon-picton-blue mdi mdi-play-box-outline"></span></div>
                        <div class="unit-body">
                            <h4 class="text-uppercase text-bold offset-md-top-20">Вебинары</h4>
                            <p>
                                The information should be not only well-organized and easy to read. thus making the process enjoyable.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>

    <!--DISCOUNT-->
    <section class="context-dark section-66 section-top-66">
        <section class="section-66 section-top-66 bg-mantis section-triangle section-triangle-bottom">
            <div class="shell">
                <div class="range range-sm-center">
                    <h2><span class="big">Скидка 15% на первый заказ курса</span></h2>
                    <div class="cell-md-8">
                        <p>
                            Товарищи! рамки и место обучения кадров способствует подготовки и реализации форм развития.
                            С другой стороны сложившаяся структура организации позволяет выполнять важные задания по разработке направлений прогрессивного развития.
                        </p>
                    </div>
                </div>
            </div>
            <svg class="svg-triangle-bottom" xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <lineargradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:rgb(71,149,213);stop-opacity:1;"></stop>
                        <stop offset="100%" style="stop-color:rgb(71,149,213);stop-opacity:1;"></stop>
                    </lineargradient>
                </defs>
                <polyline points="0,0 60,0 29,29" fill="url(#grad1)"></polyline>
            </svg>
        </section>
    </section>


    <section class="section parallax-container" data-parallax-img="images/bg-03-1920x1425.jpg">
        <div class="parallax-content">
            <div class="section-50 section-lg-70 shell">
                <div class="range range-xs-center">
                    <div class="cell-lg-10">
                        <h1 class="text-bold">Ближайшие события</h1>
                        <p>Здесь не все события, 5 ближайших  текст текст текст</p>
                        <div class="offset-top-50 offset-md-top-90 event">
                            <ul class="tabs nav nav-pills nav-justified nav-custom text-center" id="tabs-2" role="tablist">
                                @foreach($courses as $course)
                                    @if($loop->first)
                                        <li class="active" role="presentation"><a href="#tab1" role="tab"><span><?=strftime("%d %B %Y, %H:%M", strtotime("12/28/2002"));?></span></a></li>
                                    @else
                                        <li role="presentation"><a href="#tab2" role="tab"><span>{{Carbon\Carbon::parse($course->time_start)->formatLocalized('%d %B %Y') }}</span></a></li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="tab-content tab-conten-vert offset-top-50 text-md-left">
                                <div class="tab-pane fade active in post-event-type-3" id="tab1" role="tabpanel">
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">2:20 PM</h2>
                                                <p class="post-event-author">MICHAEL LAMBERT</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Event registration & breakfast</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade post-event-type-3" id="tab2" role="tabpanel">
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">1:20 PM</h2>
                                                <p class="post-event-author">MICHAEL LAMBERT</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Event registration & breakfast</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">4:20 PM</h2>
                                                <p class="post-event-author">JULY MAO</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>New technologies in web design</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">6:00 PM</h2>
                                                <p class="post-event-author">JOHN DOE</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Promoting your app using SEO</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:40 PM</h2>
                                                <p class="post-event-author">BERNARD SHOW</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Web project management</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade post-event-type-3" id="tab3" role="tabpanel">
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">12:20 AM</h2>
                                                <p class="post-event-author">MICHAEL LAMBERT</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Event registration & breakfast</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">4:40 PM</h2>
                                                <p class="post-event-author">JULY MAO</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>New technologies in web design</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:00 PM</h2>
                                                <p class="post-event-author">JOHN DOE</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Promoting your app using SEO</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:40 PM</h2>
                                                <p class="post-event-author">BERNARD SHOW</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Web project management</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade post-event-type-3" id="tab4" role="tabpanel">
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">2:20 PM</h2>
                                                <p class="post-event-author">MICHAEL LAMBERT</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Event registration & breakfast</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">5:40 PM</h2>
                                                <p class="post-event-author">JULY MAO</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>New technologies in web design</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:00 PM</h2>
                                                <p class="post-event-author">JOHN DOE</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Promoting your app using SEO</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:40 PM</h2>
                                                <p class="post-event-author">BERNARD SHOW</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Web project management</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade post-event-type-3" id="tab5" role="tabpanel">
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">2:20 PM</h2>
                                                <p class="post-event-author">MICHAEL LAMBERT</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Event registration & breakfast</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">5:40 PM</h2>
                                                <p class="post-event-author">JULY MAO</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>New technologies in web design</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:00 PM</h2>
                                                <p class="post-event-author">JOHN DOE</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Promoting your app using SEO</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range post-event-item">
                                        <div class="cell-md-4 text-md-right">
                                            <div class="post-event-inset">
                                                <h2 class="post-event-time">7:40 PM</h2>
                                                <p class="post-event-author">BERNARD SHOW</p>
                                            </div>
                                        </div>
                                        <div class="cell-md-8 offset-top-20 offset-md-top-0">
                                            <div class="post-event-info">
                                                <!-- Boxed Accordion-->
                                                <div class="responsive-tabs responsive-tabs-boxed" data-type="accordion">
                                                    <ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">
                                                        <li>Web project management</li>
                                                    </ul>
                                                    <div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">
                                                        <div class="small">
                                                            After completing the registration form at one of Intense
                                                            Terminals, where visitors should state their personal
                                                            information and contacts, they will be invited to the breakfast
                                                            devoted to the opening of our event. If you register first,
                                                            you’ll receive additional bonuses, so hurry up!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-66">
            <a class="btn btn-primary" href="/schedule">Посмотреть все события</a>
        </section>
    </section>

    <!-- section our team-->
    <section class="section-top-66 section-bottom-110">
        <div class="shell">
            <h2><span class="big">Наши докладчики</span></h2>
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
        <section class="section-33">
            <a class="btn btn-primary" href="/speakers">Посмотреть всех докладчиков</a>
        </section>
    </section>
    <!-- What Clients say-->
    <section class="context-dark bg-gray-darkest">
        <div class="parallax-container" data-parallax-img="images/background-03-1920x900.jpg">
            <div class="parallax-content">
                <div class="shell section-98 section-sm-110">
                    <h2><span class="big">Что говорят клиенты?</span></h2>
                    <hr class="divider divider-md bg-mantis">
                    <div class="range offset-top-66">
                        <!-- Custom Pagination-->
                        <ul class="list-inline owl-custom-pagination">
                            <li class="owl-dot-custom img-circle img-bordered-white" data-owl-item="0"><img class="img-circle" width="90" height="90" src="images/user-kira-force-90x90.jpg" alt=""></li>
                            <li class="owl-dot-custom img-circle img-bordered-white" data-owl-item="1"><img class="img-circle" width="90" height="90" src="images/user-diana-russo-90x90.jpg" alt=""></li>
                        </ul>
                        <!-- Testimonials Slider with Custom Pagination-->
                        <div class="owl-carousel owl-carousel-default owl-carousel-class-light veil-md-owl-dots veil-owl-nav reveal-md-owl-nav inset-left-7p inset-right-7p" data-mouse-drag="false" data-active="2" data-loop="false" data-dots="true" data-dots-custom=".owl-custom-pagination" data-nav="true" data-nav-class="[&quot;owl-prev mdi mdi-chevron-left&quot;, &quot;owl-next mdi mdi-chevron-right&quot;]">
                            <div>
                                <blockquote class="quote quote-custom-image offset-top-0 offset-sm-top-24"><img class="img-circle img-bordered-white img-responsive center-block veil-sm" width="90" height="90" src="images/user-kira-force-90x90.jpg" alt="">
                                    <p class="quote-body offset-top-34">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям.</p>
                                    <div class="offset-top-41">
                                        <h3 class="font-accent">Алексей Иванов</h3>
                                    </div>
                                    <p class="text-uppercase text-bold text-spacing-120 offset-top-10"><span class="small text-malibu">Белгород, Врач-стоматолог</span></p>
                                </blockquote>
                            </div>
                            <div>
                                <blockquote class="quote quote-custom-image offset-top-0 offset-sm-top-24"><img class="img-circle img-bordered-white img-responsive center-block veil-sm" width="90" height="90" src="images/user-diana-russo-90x90.jpg" alt="">
                                    <p class="quote-body offset-top-34">С другой стороны реализация намеченных плановых заданий в значительной степени обуславливает создание соответствующий условий активизации. Таким образом дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание существенных финансовых и административных условий. Повседневная практика показывает, что рамки и место обучения кадров позволяет оценить значение новых предложений.</p>
                                    <div class="offset-top-41">
                                        <h3 class="font-accent">Ольга Сергеева</h3>
                                    </div>
                                    <p class="text-uppercase text-bold text-spacing-120 offset-top-10"><span class="small text-malibu">Москва, Педиатр</span></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Our Partners-->
    <section class="section-top-124 section-bottom-98 bg-gray-darkest context-dark">
        <div class="shell">
            <div>
                <h2><span class="big">Наши партнеры</span></h2>
                <hr class="divider bg-mantis">
                <div class="range range-xs-center offset-top-24">
                    <div class="cell-xs-10">
                        <p>Не следует, однако забывать, что постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании модели развития. Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности требуют от нас анализа существенных финансовых и административных условий. </p>
                    </div>
                    <div class="cell-xs-12">
                        <div class="offset-top-66">
                            <!-- owl carousel-->
                            <div class="owl-carousel owl-carousel-default owl-carousel-class-light" data-loop="false" data-items="1" data-xs-items="2" data-dots="true" data-mouse-drag="false" data-md-items="4" data-nav="false">
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-01-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-02-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-03-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-04-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-04-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-03-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-02-181x101.png" width="181" height="101" alt=""></a>
                                <a href="clients.html"><img class="img-responsive reveal-inline-block img-semi-transparent" src="images/clients/partner-01-181x101.png" width="181" height="101" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('slider')
    @include('site.layouts.slider')
@endsection