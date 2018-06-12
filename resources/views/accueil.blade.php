@extends('layouts.master')


@section('content')



<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{$maps_json[0]->poster_url}}" alt="{{$maps_json[0]->titre}}" >
      <div class="carousel-caption">
        <h3>{{$maps_json[0]->titre}}</h3>
        <p>{{$maps_json[0]->prix}}</p>
      </div>
    </div>

    <?php
/*
$maps_json->each(function ($array) {
	if ($array->id != 1) {
		$url = 'www.victoriatheatre.co.uk/sites/default/files/cards/aquditorium.jpg';

		echo '  <div class="carousel-item">
      <img src=' . ($array->poster_url ? $array->poster_url : $url) . '
      alt="{{$array->titre}}">
      <div class="carousel-caption">
        <h3>' . $array->titre . '</h3>
        <p>' . $array->prix . '</p>

      </div>
    </div>';}
});*/?>



@foreach ($maps_json as $map )
@if ($map->id!=1)
<div class="carousel-item">
  <img src="{{ $map->poster_url ? $map->poster_url : 'https://www.victoriatheatre.co.uk/sites/default/files/cards/aquditorium.jpg' }}"  alt="{{$map->titre}}">
  <div class="carousel-caption">
    <h3>{{ $map->titre }}</h3>
    <p>{{ $map->prix }}</p>

  </div>
</div>
@endif
    
@endforeach
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>






















@endsection

