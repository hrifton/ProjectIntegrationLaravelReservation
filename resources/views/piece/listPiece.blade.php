@extends('layouts.master')


@section('content')

<div class="container">
     <h1>Liste pieces de théatre</h1>

    <?php 
    $t=count($maps_json["hydra:member"]);
    ?>

<img src="{{  $maps_json["hydra:member"][0]["image"]["contentUrl"]["small"]}} }}" alt="Image" class="img-thumbnail">
    @for ($i =0 ; $i <$t ; $i++)
    
    <div class="col-sm-6">
        <div class="card">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{ $maps_json["hydra:member"][$i]["name"] }}</h5>
            <p class="card-text">{{ $maps_json["hydra:member"][$i]["excerpt"]}}</p>
            <img src="{{ asset($maps_json["hydra:member"][$i]["image"]["contentUrl"]["small"]) }}">
            <p class="card-text">Lieu :{{ reset($maps_json["hydra:member"][$i]["placesNames"])}}</p>
           
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

  
    @endfor

{{dd($maps_json["hydra:member"])}}

   
    </div>

@endsection
