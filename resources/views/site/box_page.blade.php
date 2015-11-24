@extends('layouts.default')

@section('title', 'Просмотр коробки')

@section('content')
	<div class="row">

		<h3><a href="{{ route('home') }}">Главная</a> - {{ $box->title }}</h3>
		
		<div class="col-md-12 text-center">
			<div class="roulette_container" >
	            <div class="roulette" style="display:none;"> 
	                
	                <img width="250" height="194" src="/images/box.jpg"/>
	                @if (count($box_lures) > 0)
	                	@foreach ($box_lures as $lure)
	                		<img width="250" src="/images/vobler.jpg"/>
	                	@endforeach
	                @endif
	            </div> 
            </div> 
		    <div class="text-center">
		    	id коробки: {{ $box->_id }}
		    </div>
		    <div class="text-center">
		    	{{ $box->title }}
		    </div>
		    <div class="text-center">
		    	Цена: {{ $box->price }} руб.
		    	<input type="hidden" id="current-box-price" value="{{ $box->price }}">
		    	<input type="hidden" id="current-box-id" value="{{ $box->_id }}">
		    </div>	
		    <div class="balance-line">
		    	@if(Auth::user()->getBalance() < $box->price)
		    		У вас не достаточно баланса, для открытия коробки! <a href="{{ route('addbalance', ['id' => Auth::user()->_id, 'value' => 100]) }}">пополнить баланс на 100 рублей</a>
		    	@else
		    		@if (count($box_lures) > 0)
				    	<button class="btn btn-primary" id="start-roulette" style="margin: 20px 0;">Открыть коробку!</button><br>
				    	Нажимая на кнопку, Вы соглашаетесь с тем, что с вашего баланса спишется сумма, указанная в стоимости коробки! 
				    @else

				    @endif
		    	@endif
		    </div>
		</div>
		@if (count($box_lures) > 0)
		<div class="col-md-12 text-center">
			<h3>В этой коробке могут быть:</h3>
		</div>
		
		@foreach ($box_lures as $lure)
		<div class="col-lg-2 col-md-2 col-xs-4 lure-thumb">
			<img class="img-responsive" src="/images/vobler.jpg">
			<!-- <div class="text-center">
		    	{{ $lure->_id }}
		    </div> -->
		    <div class="text-center">
		    	{{ $lure->title }}
		    </div>
		    <div class="text-center">
		    	Цена: {{ $lure->price }} руб.
		    </div>	
		</div>
		@endforeach
		@else
			<div class="col-md-12 text-center">
				<h3>Приманки в коробке отсутствуют.</h3>
				<a href="{{ route('addrandomlures', ['id' => $box->_id]) }}">добавить случайные приманки из базы (должно быть доступно только админам)</a>
			</div>
		    
		@endif
	</div>
@endsection