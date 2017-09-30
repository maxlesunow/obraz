
@include('admin.partials.form.input', ['id' => 'last_name', 'name' => 'Фамилия:'])

@include('admin.partials.form.input', ['id' => 'first_name', 'name' => 'Имя:'])

@include('admin.partials.form.input', ['id' => 'middle_name', 'name' => 'Отчество:'])

@include('admin.partials.form.input', ['id' => 'position', 'name' => 'Должность:'])

@include('admin.partials.form.textarea', ['id' => 'description', 'name' => 'Описание:'])

@include('admin.partials.form.checkbox', ['id' => 'show_home', 'name' => 'Показывать на главной:'])

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