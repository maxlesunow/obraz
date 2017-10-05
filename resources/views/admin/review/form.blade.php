@include('admin.partials.form.checkbox', ['id' => 'status', 'name' => 'Статус:'])

@include('admin.partials.form.input', ['id' => 'rating', 'name' => 'Рейтинг:'])

@include('admin.partials.form.textarea', ['id' => 'text', 'name' => 'Текст:'])

@include('admin.partials.form.select', ['id' => 'user', 'name' => 'Пользователь:', 'value' => $user, 'values' => $users])

@include('admin.partials.form.input', ['id' => 'date', 'name' => 'Дата отзыва:'])

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