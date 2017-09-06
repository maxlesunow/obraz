<div class="breadcrumb-line breadcrumb-line-component content-group-lg"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    <ul class="breadcrumb">
        <li><a href="/"><i class="icon-home2 position-left"></i> Главная</a></li>
        @foreach($breadcrumbs as $crumb)
            @if($loop->last)
                <li class="active">{{$crumb['title']}}</li>
            @else
                <li><a href="{{$crumb['url']}}">{{$crumb['title']}}</a></li>
            @endif
        @endforeach
    </ul>
</div>