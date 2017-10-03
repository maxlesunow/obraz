@extends('site.layouts.app')


@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'О компании',
        'icon' => 'mdi-account-multiple-outline',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'О компании'),
        )])
@endsection

@section('content')
    @include('site.partials.text',
        [
            'name'=> $page->title,
            'description'=> $page->text,
        ])
    <div class="shell">
        <div class="range range-xs-center">
            <div class="cell-xs-10 cell-sm-9 cell-md-8">
                <section class="section-bottom-66">
                    <hr class="divider bg-mantis">
                    <div class="offset-top-41">
                        @foreach($reviews as $review)
                            <div class="box-comment text-left box-comment-classic offset-top-20">
                                <div class="media">
                                    <div class="media-body">
                                        <header class="box-comment-header unit unit-vertical unit-spacing-xxs unit-md unit-md-horizontal unit-md-inverse unit-md-middle unit-md-align-right">
                                            <div class="unit-left">
                                                <ul class="box-comment-meta list-inline list-inline-sm text-dark">
                                                    <li>
                                                        <div class="product-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if($review->rating >= $i)
                                                                    <span class="mdi mdi-star"></span>
                                                                @else
                                                                    <span class="mdi mdi-star-outline"></span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </li>
                                                    <li><span class="box-comment-icon mdi mdi-clock"></span>
                                                        <time>{{ Carbon\Carbon::parse($review->date)->formatLocalized('%d %B %Y')}}</time>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="unit-body">
                                                <h6 class="box-comment-title">{{$review->user->first_name}} {{$review->user->middle_name}}</h6>
                                            </div>
                                        </header>
                                        <section class="box-comment-body text-justify">
                                            <p>{{$review->text}}</p>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr class="divider bg-mantis">
                    {{ $reviews->links() }}

                    @guest
                    <h6 class="offset-top-34 text-uppercase text-center text-bold">Оставлять отзывы могут только клиенты нашего сайта</h6>
                    @else
                        <h6 class="offset-top-34 text-uppercase text-left text-bold">{{Auth::user()->first_name}} {{Auth::user()->middle_name}}, пользовались нашими услугами? Оставьте отзыв</h6>
                        <form class="offset-top-10 text-left">
                            <div class="form-group">
                                <label class="form-label form-label-outside" for="box-comment-classic-comment-message">Оценка:</label>
                                <div class="product-rating">
                                    <span class="mdi mdi-star"></span>
                                    <span class="mdi mdi-star"></span>
                                    <span class="mdi mdi-star"></span>
                                    <span class="mdi mdi-star-half"></span>
                                    <span class="mdi mdi-star-outline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label-outside" for="box-comment-classic-comment-message">Сообщение:</label>
                                <textarea class="form-control" id="box-comment-classic-comment-message" data-constraints="@Required"></textarea>
                            </div>
                            <div class="group-sm text-left offset-top-20">
                                <button class="btn btn-md btn-primary" type="button">Оставить отзыв</button>
                            </div>
                        </form>
                    @endguest
                </section>
            </div>
        </div>
    </div>
@endsection