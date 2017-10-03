<div>
    <h6 class="text-uppercase text-spacing-60">Ближайшие события</h6>
    <div class="text-subline"></div>
    <div class="offset-top-34">
        @foreach($upcoming_courses as $course)
            <article class="post widget-event text-left">
                <a href="#">
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                        <div class="unit-left"><img class="img-circle" width="46" height="46" src="{{$course->image}}" alt=""></div>
                        <div class="unit-body">
                            <div class="post-meta">
                                <ul class="list-inline list-inline-sm">
                                    <li>
                                        <span class="icon-xxs text-picton-blue mdi mdi-calendar"></span>
                                        <time class="text-dark">{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%d %B %Y')}}</time>
                                    </li>
                                    <li>
                                        <span class="icon-xxs text-picton-blue mdi mdi-clock"></span>
                                        <time class="text-dark">{{ Carbon\Carbon::parse($course->time_start)->formatLocalized('%H:%M')}}</time>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-title">
                                <h6 class="text-regular">{{$course->name}}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>

</div>