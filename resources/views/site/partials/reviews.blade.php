<section class="context-dark bg-gray-darkest">
    <div class="parallax-container" data-parallax-img="images/background-03-1920x900.jpg">
        <div class="parallax-content">
            <div class="shell section-66 section-sm-66">
                @isset($name)
                    <h1><span class="big">{{$name}}</span></h1>
                @endisset

                @isset($description)
                    <p>{{$description}}</p>
                @endisset
                <hr class="divider divider-md bg-mantis">
                <div class="range">
                    <div class="owl-carousel owl-carousel-default owl-carousel-class-light veil-md-owl-dots veil-owl-nav reveal-md-owl-nav inset-left-7p inset-right-7p" data-mouse-drag="false" data-active="2" data-loop="false" data-dots="true" data-dots-custom=".owl-custom-pagination" data-nav="true" data-nav-class="[&quot;owl-prev mdi mdi-chevron-left&quot;, &quot;owl-next mdi mdi-chevron-right&quot;]">
                        @foreach($reviews as $review)
                                <div>
                                    <blockquote class="quote quote-custom-image offset-top-0 offset-sm-top-24"><img class="img-circle img-bordered-white img-responsive center-block veil-sm" width="90" height="90" src="images/user-kira-force-90x90.jpg" alt="">
                                        <p class="quote-body">{{$review->text}}</p>
                                        <div class="offset-top-41">
                                            <h3 class="font-accent">{{$review->user->full_name}}</h3>
                                        </div>
                                        <p class="text-uppercase text-bold text-spacing-120 offset-top-10"><span class="small text-malibu">{{ Carbon\Carbon::parse($review->created_at)->formatLocalized('%d %B %Y')}}</span></p>
                                    </blockquote>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @isset($button_name)
                <section class="section-bottom-66">
                    <a class="btn btn-icon btn-icon-left btn-default btn-lg btn-anis-effect" href="{{$button_url}}">
                        <span class="btn-text">{{$button_name}}</span>
                    </a>
                </section>
            @endisset
        </div>
    </div>
</section>