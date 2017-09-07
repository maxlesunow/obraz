<div class="form-group {{$errors->has($id) ? 'has-error has-feedback' : ''}}">
    {!! Form::label($id, $name, ['class' => 'control-label col-lg-2 text-semibold']) !!}
    <div class="col-lg-10">
        {{ Form::text($id, null, ['class' => 'form-control']) }}
        @if ($errors->has($id))
            <div class="form-control-feedback">
                <i class="icon-cancel-circle2"></i>
            </div>
            <span class="help-block">  {{ $errors->first($id) }}</span>
        @endif
    </div>
</div>