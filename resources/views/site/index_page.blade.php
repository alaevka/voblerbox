@extends('layouts.default')

@section('title', 'Главная страница')

@section('content')
	<div class="row">

		@foreach ($boxes as $box)
		<div class="col-lg-3 col-md-4 col-xs-6 box-thumb">
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