<div class="rd-calendar">
    <div class="rdc-panel">
        <a class="rdc-next"></a>
        <a class="rdc-prev"></a>
        <div class="rdc-month"></div>
        <div class="rdc-fullyear"></div>
    </div>
    <div class="rdc-table"></div>
    <div class="rdc-events text-left">
        <a class="rdc-events_close"></a>
        <ul>
            @foreach($calendar_courses as $course)
                <li class="rdc-event" data-date="{{Carbon\Carbon::parse($course->time_start)->format('m/d/Y')}}">
                    <div class="rdc-event-wrap">
                        <article class="post widget-event">
                            <div class="post-meta">
                                <span class="icon icon-xxs text-picton-blue mdi mdi-clock"></span>
                                <time class="text-dark" datetime="2016-01-01">{{Carbon\Carbon::parse($course->time_start)->format('H:i')}}</time>
                            </div>
                            <div class="post-title">
                                <h6 class="text-regular">
                                    <a href="{{$course->url}}">{{$course->name}}</a>
                                </h6>
                            </div>
                        </article>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
