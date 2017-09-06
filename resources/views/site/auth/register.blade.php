{{--  @extends('site.layouts.app')  --}}

{{--  @section('content')  --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal registerForm" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Подвердить пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group registerBtn">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Регистрация
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    $(".registerForm").submit(function( event ) {    
        event.preventDefault();

        var $form = $( this );
        var url = $form.attr( "action" );
        
        var _token = $(this).find("input[name='_token']").val();
        var phone = $(this).find("input[name='phone']").val();
        var password = $(this).find("input[name='password']").val();
        var password_confirmation = $(this).find("input[name='password_confirmation']").val();
        
        var posting = $.post( url, { _token:_token, phone:phone, password:password, password_confirmation:password_confirmation } );
        
        posting.always(function( data, status ) {
            if (status === "success") {
                console.log("success")
            } else if (status === "error") {
                console.log("error")
            } else {
                console.log("WTF")
            }
        });
    });
    </script>
</div>
{{--  @endsection  --}}
