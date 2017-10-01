<section class="offset-top-66 offset-md-top-66">
    <div class="shell">
        @isset($name)
            <h1>{{$name}}</h1>
        @endisset

        @isset($description)
            <p>{!!$description!!}</p>
        @endisset
    </div>
</section>