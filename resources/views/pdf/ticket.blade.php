<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            body { font-family: DejaVu Serif, sans-serif; }

            h1 {
                font-size: 16px;
                padding: 0px;
                margin: 0px;
            }

            h2 {
                font-size: 14px;
                padding: 0px;
                margin: 0px;
            }

            .center{
                text-align: center;
            }

            .border{
                padding: 20px;
                border: 2px dashed black;
            }
        </style>
        <title>Входной билет №{{$reservation->id}}</title>
    </head>
    <body>

        <div class="border">

            <h1 class="center">КОНСАЛТИНГОВОЕ ПРОСТРАНСТВО «ОБРАЗ»</h1>
            <h2 class="center">8-980-522-19-99, 8-919-439-97-59</h2>
            <h2 class="center">www.obraz-consulting.ru</h2>
            <div class="center" style="margin-bottom: 20px; margin-top: 10px">
                <img src="./../public/images/logos/logo-full.png" width="100px">
            </div>

            <h1 class="center">ВХОДНОЙ БИЛЕТ №{{$reservation->id}}</h1>
            <div class="center" style="margin-bottom: 10px">{{$reservation->user->full_name}}</div>

            <div class="">КУРС: <b>«{{$reservation->course->name}}»</b></div>
            @foreach($reservation->course->speakers as $speaker)

                <div class="">Лектор: {{$speaker->full_name}}</div>
            @endforeach

            <div class="" style="margin-top: 20px">Дата регистрации: {{ Carbon\Carbon::parse($reservation->course->time_register)->formatLocalized('%d %B %Y %H:%M')}}</div>
            <div class="">Дата проведения: {{ Carbon\Carbon::parse($reservation->course->time_start)->formatLocalized('%d %B %Y %H:%M')}}</div>
            <div class="">Место проведения: {{$reservation->course->address}}</div>

            @if($reservation->status == True)
                <div>Статус: <b>ОПЛАЧЕНО</b></div>
            @else
                <div>Статус: <b>НЕ ОПЛАЧЕНО</b></div>
            @endif

            <div class="center" style="margin-top: 10px">Белгород, 2017</div>
        </div>
    </body>
</html>
