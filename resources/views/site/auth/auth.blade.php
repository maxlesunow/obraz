@guest
<button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#registerModal">
    Зарегистрироваться
</button>

<button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#loginModal">
    Войти
</button>


<div class="modal fade" id="registerModal"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <register></register>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="loginModal"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <login></login>
            </div>

        </div>
    </div>
</div>
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
@endguest

