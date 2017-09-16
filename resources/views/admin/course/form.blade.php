@include('admin.partials.form.input', ['id' => 'name', 'name' => 'Название:'])

@include('admin.partials.form.select', ['id' => 'course_type', 'name' => 'Тип курса:', 'value' => $course_type, 'values' => $course_types])

@include('admin.partials.form.select', ['id' => 'course_group', 'name' => 'Группа:', 'value' => $course_group, 'values' => $course_groups])

@include('admin.partials.form.multiselect', ['id' => 'course_group', 'name' => 'Докладичики:', 'value' => null, 'values' => $speakers])

@include('admin.partials.form.input', ['id' => 'address', 'name' => 'Адрес:'])

@include('admin.partials.form.input', ['id' => 'time_start', 'name' => 'Время начала:'])

@include('admin.partials.form.input', ['id' => 'time_register', 'name' => 'Время регистрации:'])

@include('admin.partials.form.input', ['id' => 'cost', 'name' => 'Стоимость:'])

@include('admin.partials.form.input', ['id' => 'image', 'name' => 'Главное фото:'])

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