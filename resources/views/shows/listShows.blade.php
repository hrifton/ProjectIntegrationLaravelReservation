@extends('layouts.master')


@section('content')

<div class="container">
	<h1>Liste pieces de théatre</h1>
	<div class="row">
		@foreach ($maps_json as $map )

		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="{{ $map->poster_url ? $map->poster_url : 'https://www.victoriatheatre.co.uk/sites/default/files/cards/aquditorium.jpg' }}" alt="{{ $map->titre }}">
			<div class="card-body">
				<h5 class="card-title">{{ $map->titre }}</h5>

				<p class="card-text">{{substr($map->descriptif,0,125) }}</p>

				<a href="{{ route('show',$map->id) }}" class="btn btn-primary">info</a>
			</div>
		</div>
		<div class="col-md-1"></div>
		@endforeach
	</div>
</div>



@endsection
