<section class="context-dark section-top-66">
    <section class="section-66 section-top-66 bg-mantis section-triangle section-triangle-bottom">
        <div class="shell">
            <div class="range range-sm-center">

                @isset($name)
                    <h1><span class="big">{{$name}}</span></h1>
                @endisset

                @isset($description)
                    <div class="cell-md-8">
                        <p>{{$description}}</p>
                    </div>
                @endisset
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