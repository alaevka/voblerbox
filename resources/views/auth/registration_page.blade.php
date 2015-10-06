@extends('layouts.default')

@section('title', 'Регистрация на сайте')

@section('content')
    <div>
		<div class="row">
			<h3>@yield('title')</h3>
		</div>
    	<div class="row">
			<form method="POST" action="{{URL::to('registration')}}" id="form-registration" accept-charset="UTF-8">
	            <!-- CSRF Token -->
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <!-- ./ csrf token -->

	            <div class="form-group {{$errors->has('firstname') ? 'has-error':''}}">
	                <input class="form-control" tabindex="1" placeholder="Ваше имя" type="text" name="firstname" id="firstname" value="{{ Input::old('firstname') }}"> 
	                {!!$errors->first('firstname', '<span class="help-block error-input">:message </span>')!!}
	            </div>

	            <div class="form-group {{$errors->has('lastname') ? 'has-error':''}}">
	                <input class="form-control" tabindex="1" placeholder="Ваша фамилия" type="text" name="lastname" id="lastname" value="{{ Input::old('lastname') }}"> 
	                {!!$errors->first('lastname', '<span class="help-block error-input">:message </span>')!!}
	            </div>

	            <div class="form-group {{$errors->has('phone') ? 'has-error':''}}">
	                <input class="form-control" tabindex="1" placeholder="Номер мобильного телефона" type="text" name="phone" id="phone" value="{{ Input::old('phone') }}"> 
	                {!!$errors->first('phone', '<span class="help-block error-input">:message </span>')!!}
	            </div>
	            
	            <div style="margin-bottom: 20px; text-align: center;">
	                <button tabindex="3" type="submit" style="width: 200px;" disabled="disabled" id="form-registration-submit" class="btn btn-primary">Продолжить</button>
	            </div>
	            
	        </form>
	    </div>
    </div>
@endsection