@if(isset($breadcrumbs))
<section class="breadcrumb-classic">
    <div class="shell section-34 section-sm-50">
        <div class="range range-lg-middle">
            <div class="cell-lg-2 veil reveal-sm-block cell-lg-push-2"><span class="mdi mdi-account-box-outline icon icon-white"></span></div>
            <div class="cell-lg-5 veil reveal-lg-block cell-lg-push-1 text-lg-left">
                <h2><span class="big">{{end($breadcrumbs)->title}}</span></h2>
            </div>
            <div class="offset-top-0 offset-sm-top-10 cell-lg-5 offset-lg-top-0 small cell-lg-push-3 text-lg-right">
                <ul class="list-inline list-inline-dashed p">
                    @foreach($breadcrumbs as $crumb)
                        <li><a href="{{$crumb['url']}}">{{$crumb['title']}}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <svg class="svg-triangle-bottom" xmlns="https://www.w3.org/2000/svg" version="1.1">
        <defs>
            <lineargradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:rgb(110,192,161);stop-opacity:1;"></stop>
                <stop offset="100%" style="stop-color:rgb(111,193,156);stop-opacity:1;"></stop>
            </lineargradient>
        </defs>
        <polyline points="0,0 60,0 29,29" fill="url(#grad1)"></polyline>
    </svg>
</section>
@endif