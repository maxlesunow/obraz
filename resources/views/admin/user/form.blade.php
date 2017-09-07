
<div class="form-group">
    {!! Form::label('is_verification', 'Подтверждение:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::checkbox('is_verification', null, null, ['class' => 'form-control js-switch switcher']) !!}
    </div>
</div>

@include('admin.partials.form.input', ['id' => 'last_name', 'name' => 'Фамилия:'])

@include('admin.partials.form.input', ['id' => 'first_name', 'name' => 'Имя:'])

@include('admin.partials.form.input', ['id' => 'middle_name', 'name' => 'Отчество:'])

@include('admin.partials.form.input', ['id' => 'phone', 'name' => 'Телефон:'])

@include('admin.partials.form.input', ['id' => 'email', 'name' => 'E-mail:'])

@include('admin.partials.form.input', ['id' => 'created_at', 'name' => 'Дата регистрации:'])

@include('admin.partials.form.select', ['id' => 'created_at', 'name' => 'Тип пользователя:', 'value' => $role, 'values' => $roles])

<div class="form-group">
    <div class="text-right">
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('scripts')
    <script>
        $('select').select2({
            // options
        });
    </script>

    <script>
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    </script>
@endsection