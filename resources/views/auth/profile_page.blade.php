@extends('layouts.default')

@section('title', 'Профиль пользователя')

@section('content')
    <div>
		<div class="row">
			<h3>@yield('title')</h3>
		</div>
		<div class="row">
	    	<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Настройки профиля</a></li>
				<li role="presentation"><a href="#box_history" aria-controls="box_history" role="tab" data-toggle="tab">История открытых коробок</a></li>
				<li role="presentation"><a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Мои продажи</a></li>
				<li role="presentation"><a href="#balance_history" aria-controls="balance_history" role="tab" data-toggle="tab">История операций с балансом</a></li>
				<li role="presentation"><a href="#balance_replenish" aria-controls="balance_replenish" role="tab" data-toggle="tab">Пополнить баланс</a></li>
			</ul>
			<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="settings">
			    	<legend class="profile-legend">Основные настройки</legend>

			    	<form method="POST" action="{{URL::to('profile/settings')}}" id="form-login" accept-charset="UTF-8">
			            <!-- CSRF Token -->
			            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			            <!-- ./ csrf token -->
			            
			            <div class="form-group {{$errors->has('phone') ? 'has-error':''}}">
			                <input class="form-control" tabindex="1" placeholder="Номер мобильного телефона" type="text" name="phone" id="phone" value="{{ Input::old('phone') }}"> 
			                {!!$errors->first('phone', '<span class="help-block error-input">:message </span>')!!}
			            </div>

			            <div class="form-group {{$errors->has('firstname') ? 'has-error':''}}">
			                <input class="form-control" tabindex="1" placeholder="Ваше имя" type="text" name="firstname" id="firstname" value="{{ Input::old('firstname') }}"> 
			                {!!$errors->first('firstname', '<span class="help-block error-input">:message </span>')!!}
			            </div>

			            <div class="form-group {{$errors->has('lastname') ? 'has-error':''}}">
			                <input class="form-control" tabindex="1" placeholder="Ваша фамилия" type="text" name="lastname" id="lastname" value="{{ Input::old('lastname') }}"> 
			                {!!$errors->first('lastname', '<span class="help-block error-input">:message </span>')!!}
			            </div>

			            <div>
			                <button tabindex="3" type="submit" style="width: 200px;" disabled="disabled" id="form-login-submit" class="btn btn-primary">Сохранить</button>
			            </div>
			            
			        </form>


			    	<legend class="profile-legend">Адрес доставки</legend>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="box_history">
			    	@if (count($orders) > 0)
						@foreach ($orders as $order)
						<div>
							
						   id коробки: {{ $order->box_id }} - {{ $order->box->title }}, что попалось: {{ $order->lure->title }} - {{ $order->created_at }}
						    	
						</div>
						@endforeach
						@else
							<div class="col-md-12 text-center">
								<h3>Вы не открыли пока ни одной коробки.</h3>
							</div>
						    
					@endif
			    </div>
			    <div role="tabpanel" class="tab-pane" id="sales">sales</div>
			    <div role="tabpanel" class="tab-pane" id="balance_history">balance_history</div>
			    <div role="tabpanel" class="tab-pane" id="balance_replenish">balance_replenish</div>
			</div>
		</div>
    </div>
@endsection