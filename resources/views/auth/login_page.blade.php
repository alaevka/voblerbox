@extends('layouts.default')

@section('title', 'Авторизация на сайте')

@section('content')
    <div>
		<div class="row">
			<h3>@yield('title')</h3>
		</div>
    	<div class="row">
			<form method="POST" action="{{URL::to('login')}}" id="form-login" accept-charset="UTF-8">
	            <!-- CSRF Token -->
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <!-- ./ csrf token -->
	            
	            <div class="{{$errors->has('phone') ? 'has-error':''}}">
	                <input class="form-control" tabindex="1" placeholder="Номер мобильного телефона" type="text" name="phone" id="phone" value="{{ Input::old('phone') }}"> 
	                {!!$errors->first('phone', '<span class="help-block error-input">:message </span>')!!}
	            </div>

	            <div class="form-group {{$errors->has('password')?'has-error':''}}">
	                <div class="password-container" style="position: relative;">
	                    <input class="form-control" tabindex="2" placeholder="Пароль" type="password" name="password" id="password"> 
	                    <a style="position: absolute; right: 8px; top: 8px;" href="{{{ URL::to('forgot') }}}">
	                        <small>Забыли пароль?</small>
	                    </a>
	                </div>
	                {!!$errors->first('password', '<span class="help-block error-input">:message </span>')!!}

	            </div>
	            
	            
	            <div style="margin-bottom: 20px; text-align: center;">
	                <button tabindex="3" type="submit" style="width: 200px;" disabled="disabled" id="form-login-submit" class="btn btn-primary">Продолжить</button>
	            </div>
	            
	        </form>
	    </div>
    </div>
@endsection