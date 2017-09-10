{{--  @guest

    <register></register>
    <login></login>

@else
    <li><a href="#">Мои данные</a></li>
    <li><a href="#">Мои курсы</a></li>
    @if(Auth::user()->role->name == 'admin')
        <li><a href="{{ url('/admin') }}">Админка</a></li>
    @endif
    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            Выйти
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        </form>
    </li>
@endguest  --}}
<auth></auth>