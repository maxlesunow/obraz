<section  class="section parallax-container" data-parallax-img="images/bg-03-1920x1425.jpg">
    <div class="parallax-content">
        <div class="shell offset-top-66">

            @isset($name)
                <h1>{{$name}}</h1>
            @endisset

            @isset($description)
                <p>{{$description}}</p>
            @endisset

            <hr class="divider divider-md bg-mantis">
            <div class="range range-xs-center">
                @foreach($courses as $course)
                    <div class="section-bottom-66 cell-sm-6 cell-md-5 cell-lg-3">
                        <!-- Post Event-->
                        <article class="post post-event-type-2">
                            <!-- Post media-->
                            <header class="post-media">
                                <a href="{{$course->url}}">
                                    <img src="images/blog/post-07-270x310.jpg" width="270" height="310" alt=""/>
                                    <span class="icon fa fa-info-circle"></span>
                                </a>
                            </header>
                            <!-- Post content-->
                            <section class="post-content text-left offset-top-10">
                                <!-- Post Body-->
                                <div class="post-body">

                                    <h5 class="offset-top-10"><a href="{{$course->url}}">{{$course->name}}</a></h5>

                                    <div>
                                        <div class="icon icon-xxs mdi mdi-label-outline text-middle"></div> <span class="text-middle">{{$course->course_group->name}}</span>
                                    </div>

                                    <div>
                                        <div class="icon icon-xxs mdi mdi-label text-middle"></div> <span class="text-middle">{{$course->course_type->name}}</span>
                                    </div>

                                    @isset($course->address)
                                        <div>
                                            <div class="icon icon-xxs mdi mdi-map-marker-circle text-middle"></div> <span class="text-middle">{{$course->address}}</span>
                                        </div>
                                @endisset

                                <!-- Post meta-->
                                    <div class="post-meta context-dark">
                                        <time>
                                            <span class="post-meta-day">{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%d')}}</span>
                                            <span class="post-meta-month offset-top-4">{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%B')}}</span>
                                            <span class="post-meta-time">{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%H:%I')}}</span>
                                        </time>
                                    </div>
                                </div>
                            </section>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    @isset($button_name)
        <section class="section-bottom-66">
            <a class="btn btn-primary" href="{{$button_url}}">{{$button_name}}</a>
        </section>
    @endisset
</section>