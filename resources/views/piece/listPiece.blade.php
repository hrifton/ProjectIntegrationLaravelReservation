@extends('layouts.master')


@section('content')

    <div class="container">
     <h1>Liste pieces de théatre</h1>

<?php 
$t=count($maps_json["hydra:member"]);
?>


@for ($i =0 ; $i <$t ; $i++)
<ul>
<li>titre :{{ $maps_json["hydra:member"][$i]["seo"]['title'] }}</li>
    <li>excerpt: {{ $maps_json["hydra:member"][$i]["excerpt"]}}</li>
        <li>prix: {{$maps_json["hydra:member"][$i]["priceRange"] }}</li>
</ul>

@endfor



{{ dd($maps_json["hydra:member"]) }}
    </div>

@endsection
