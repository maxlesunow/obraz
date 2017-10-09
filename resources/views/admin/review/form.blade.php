@include('admin.partials.form.checkbox', ['id' => 'status', 'name' => 'Статус:'])

@include('admin.partials.form.input', ['id' => 'rating', 'name' => 'Рейтинг:'])

@include('admin.partials.form.textarea', ['id' => 'text', 'name' => 'Текст:'])

@include('admin.partials.form.select', ['id' => 'user', 'name' => 'Пользователь:', 'value' => $user, 'values' => $users])

@include('admin.partials.form.date', ['id' => 'date', 'name' => 'Дата отзыва:'])

@include('admin.partials.form.submit')

@section('scripts')
    <script>
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
    </script>
@endsection