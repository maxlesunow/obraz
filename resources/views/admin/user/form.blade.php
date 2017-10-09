@include('admin.partials.form.checkbox',  ['id' => 'is_verification', 'name' => 'Подтверждение:'])

@include('admin.partials.form.input', ['id' => 'last_name', 'name' => 'Фамилия:'])

@include('admin.partials.form.input', ['id' => 'first_name', 'name' => 'Имя:'])

@include('admin.partials.form.input', ['id' => 'middle_name', 'name' => 'Отчество:'])

@include('admin.partials.form.input', ['id' => 'phone', 'name' => 'Телефон:'])

@include('admin.partials.form.input', ['id' => 'email', 'name' => 'E-mail:'])

@include('admin.partials.form.date', ['id' => 'created_at', 'name' => 'Дата регистрации:'])

@include('admin.partials.form.select', ['id' => 'role', 'name' => 'Тип пользователя:', 'value' => $role, 'values' => $roles])

@include('admin.partials.form.submit')

@section('scripts')
    <script>
        $(function() {

            $('select').select2({
                // options
            });
            
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            
            elems.forEach(function(html) {
                var switchery = new Switchery(html);
            });
            
            setTimeout(function() {
                flatpickr('.datapicker', {
                    locale: 'ru',
                    enableTime: true,
                    time_24hr: true,
                    altInput: true,
                    altFormat: 'd.m.Y H:i',
                    dateFormat: 'Y-m-d H:i'
                })

            }, 0)
        })
    </script>

@endsection