@include('admin.partials.form.input', ['id' => 'name', 'name' => 'Название:'])

@include('admin.partials.form.checkbox', ['id' => 'is_online', 'name' => 'Онлайн:'])

@include('admin.partials.form.input', ['id' => 'type_code', 'name' => 'Код (Яндекс.Касса):'])

@include('admin.partials.form.submit')

@section('scripts')
    <script>
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    </script>
@endsection