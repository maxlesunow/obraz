<div class="form-group">
    {!! Form::label($id, $name, ['class' => 'control-label col-lg-2']) !!}
    <div class="col-lg-10">
        {!! Form::checkbox($id, null, null, ['class' => 'form-control js-switch switcher']) !!}
    </div>
</div>