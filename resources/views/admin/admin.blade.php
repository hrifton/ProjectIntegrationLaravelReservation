@extends('layouts.admin')


@section('content')


<div class="row"> <h1>Nouveau spectacle</h1></div>

<div class="row">
   <div class="unit w-2-3">
	  <div class="hero-callout">
		 <table id="example" class="display" style="width:100%">
			<thead>
			   <tr>
				  <th>Piece</th>
				  <th>Prix</th>
				  <th>Office</th>
				  <th>Age</th>
				  
				  
			   </tr>
			</thead>
			<tbody>
				
			  @foreach ($arr as $a )
			 
			  <tr>
				  <form action="/admin" method="post">
					{{ csrf_field() }}
				<td>{{ $a["name"] }}</td>
				<td>{{ $a["priceRange"] }}</td>
				<td>{{ $a["humanDates"] }}</td>
				<td>
					@if (App\Show::where('titre',$a["name"])->first())
					<button value='{{ $a["@id"] }}'  name='id' type="submit" class="btn btn-danger">Delete</button>
						@else
						<button value='{{ $a["@id"] }}'  name='id' type="submit" class="btn btn-primary">Ajouter</button>
					@endif
					
				
				</td>
				  </form> 
			</tr>
			  @endforeach
				
			</tbody>

		 </table>
	  </div>

   </div>

@stop