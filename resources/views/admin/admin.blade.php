@extends('layouts.master')


@section('content')

<div class="container">
     <h1>Gestion admin</h1>


        <div class="jumbotron"><div>Mise a jour via api Theatre de Paris</div>
            <div class="row">

			<input type="button" class="btn btn-success" value="update Spectacles"
			onclick="window.location.href='{{ route('UpdateShowApi') }}'" />

			<input type="button" class="btn btn-success" value="update representations" onclick="window.location.href='{{ route('UpdateRepresentationApi') }}'" />

			</div>
		</div>

</div>

@stop