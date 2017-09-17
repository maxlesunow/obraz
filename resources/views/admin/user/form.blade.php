@include('admin.partials.form.checkbox',  ['id' => 'is_verification', 'name' => 'Подтверждение:'])

@include('admin.partials.form.input', ['id' => 'last_name', 'name' => 'Фамилия:'])

@include('admin.partials.form.input', ['id' => 'first_name', 'name' => 'Имя:'])

@include('admin.partials.form.input', ['id' => 'middle_name', 'name' => 'Отчество:'])

@include('admin.partials.form.input', ['id' => 'phone', 'name' => 'Телефон:'])

@include('admin.partials.form.input', ['id' => 'email', 'name' => 'E-mail:'])

@include('admin.partials.form.input', ['id' => 'created_at', 'name' => 'Дата регистрации:'])

@include('admin.partials.form.select', ['id' => 'role', 'name' => 'Тип пользователя:', 'value' => $role, 'values' => $roles])

@include('admin.partials.form.submit')

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