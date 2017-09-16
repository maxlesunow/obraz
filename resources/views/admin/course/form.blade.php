@include('admin.partials.form.input', ['id' => 'last_name', 'name' => 'Название:'])

@include('admin.partials.form.input', ['id' => 'first_name', 'name' => 'Тип курса:'])

@include('admin.partials.form.input', ['id' => 'middle_name', 'name' => 'Группа:'])

@include('admin.partials.form.textarea', ['id' => 'description', 'name' => 'Докладчик:'])

@include('admin.partials.form.input', ['id' => 'meta_title', 'name' => 'Адрес:'])

@include('admin.partials.form.input', ['id' => 'meta_description', 'name' => 'Время начала:'])

@include('admin.partials.form.input', ['id' => 'meta_description', 'name' => 'Время регистрации:'])

@include('admin.partials.form.input', ['id' => 'meta_keywords', 'name' => 'Стоимость:'])

@include('admin.partials.form.input', ['id' => 'meta_url', 'name' => 'Главное фото:'])

@include('admin.partials.form.textarea', ['id' => 'description', 'name' => 'Описание:'])

@include('admin.partials.form.input', ['id' => 'meta_title', 'name' => 'Title:'])

@include('admin.partials.form.input', ['id' => 'meta_description', 'name' => 'Description:'])

@include('admin.partials.form.input', ['id' => 'meta_keywords', 'name' => 'Keywords:'])

@include('admin.partials.form.input', ['id' => 'meta_url', 'name' => 'URL:'])

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