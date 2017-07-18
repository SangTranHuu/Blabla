{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                @if (session()->has('wait')) 
                    <div class="alert alert-danger">
                        {{session('wait')}}
                    </div>
                @endif

                @if (session()->has('block'))
                    <div class="alert alert-danger">
                        {{ session('block') }}
                    </div>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

 @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    @if (session()->has('wait')) 
                        <div class="alert alert-danger">
                            {{session('wait')}}
                        </div>
                    @endif

                     @if (session()->has('block'))
                        <div class="alert alert-danger">
                            {{ session('block') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open([
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'method' => 'POST',
                            'action' => 'Auth\LoginController@login',
                        ]) !!}

                            <div class="{!! Form::showErrClass('name') !!}">
                                {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label', ]) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', old('name'), [
                                        'class' => 'form-control',
                                        'id' => 'name',
                                        'required',
                                        'autofocus',
                                    ]) !!}
                                    {!! Form::showErrField('name') !!}
                                </div>
                            </div>

                            <div class="{!! Form::showErrClass('password') !!}">
                                {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label', ]) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', [
                                        'class' => 'form-control',
                                        'id' => 'password',
                                        'required',
                                    ]) !!}
                                    {!! Form::showErrField('password') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('remember') !!} Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-offset-7">
                                    <a class="btn btn-link" href="{{ action('Auth\ResetPasswordController@reset') }}">
                                        Forgot Password
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-raised']) !!}
                                </div>
                                
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
