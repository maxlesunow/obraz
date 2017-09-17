@include('admin.partials.form.checkbox', ['id' => 'status', 'name' => 'Статус заявки:'])

@include('admin.partials.form.input', ['id' => 'cost', 'name' => 'Стоимость:'])

@include('admin.partials.form.select', ['id' => 'payment_type', 'name' => 'Способ оплаты:', 'value' => $payment_type, 'values' => $payment_types])

@include('admin.partials.form.select', ['id' => 'course', 'name' => 'Курс:', 'value' => $course, 'values' => $courses])

@include('admin.partials.form.select', ['id' => 'user', 'name' => 'Пользователь:', 'value' => $user, 'values' => $users])

@include('admin.partials.form.checkbox', ['id' => 'payment_status', 'name' => 'Статус оплаты:'])

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