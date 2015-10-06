@extends('layouts.default')

@section('title', 'Главная страница')

@section('content')
	<div class="row">
		<div class="col-md-12 how-to">
			<h1>ПЛАТФОРМА ДЛЯ ПРОДАЖИ И ПОКУПКИ СЛУЧАЙНЫХ РЫБОЛОВНЫХ ВЕЩЕЙ</h1>
			<ul>
				<li>здесь ты можешь продать не нужную снасть или приманку</li>
				<li>здесь ты можешь даром купить то, что в магазинах стоит в 5-10 раз дороже</li>
				<li>все честно, прозрачно и никакого обмана</li>
			</ul>
			<hr>
		</div>

		@foreach ($boxes as $box)
		<div class="col-lg-2 col-md-4 col-xs-6 box-thumb">
		    <a href="{{ route('box', ['id' => $box->_id]) }}">
			    <img class="img-responsive" src="/images/box.jpg"> 
			    <div class="text-center">
			    	{{ $box->_id }}
			    </div>
			    <div class="text-center">
			    	{{ $box->title }}
			    </div>
			    <div class="text-center">
			    	Цена: {{ $box->price }} руб.
			    </div>
		    </a>
		</div>
		@endforeach
	</div>
@endsection