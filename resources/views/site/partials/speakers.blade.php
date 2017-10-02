<section class="section-66">
    <div class="shell">
        @isset($name)
            <h1>{{$name}}</h1>
        @endisset

        @isset($description)
            <p>{{$description}}</p>
        @endisset

        <hr class="divider divider-md bg-mantis">
        <div class="range range-xs-center ">
            <div class="cell-sm-8 cell-lg-12">
                <div class="range range-xs-center">
                    @foreach($speakers as $speaker)
                        <div class="section-bottom-66 cell-sm-6 cell-lg-3"><img class="img-circle img-responsive center-block" src="{{$speaker->image}}" width="140" height="140" alt="">
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
    @isset($button_name)
        <section class="">
            <a class="btn btn-primary" href="{{$button_url}}">{{$button_name}}</a>
        </section>
    @endisset
</section>
