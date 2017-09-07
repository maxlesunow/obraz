<div class="form-group">
    {!! Form::label('is_verification', 'Подтверждение:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::checkbox('is_verification', null, null, ['class' => 'form-control js-switch switcher']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Фамилия:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('first_name', 'Имя:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('middle_name', 'Отчество:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Телефон:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Дата регистрации:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role', 'Тип пользователя:', ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::select('role', $roles, $role, ['class' => 'form-control']) !!}
    </div>
</div>

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