@extends('layouts.master')


@section('content')

<div class="container -fluid">
  <h1>Liste pieces de théatre</h1>
  <section>
    <div class="row">
      <div class="col-md-7">
        <img class="img-top img-fluid" src="{{ $show->poster_url ? $show->poster_url : 'https://www.victoriatheatre.co.uk/sites/default/files/cards/aquditorium.jpg' }}" alt="{{ $show->titre }}">
        <h2 >{{ $show->titre }}</h2>
      </div>

      <!--  todo form    -->
      <form>
        <div class="form-group row">
          <label for="date" class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-5">
            <select name="reprensentation" size="1">
              @foreach ($representations as $representation )
              @if (Date ::now()->format('Y-m-d H:i:s')<$representation)
              <option value="{{ $representation }}">{{ $representation }}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
         <label for="place" class="col-sm-2 col-form-label">Place</label>
         <div class="col-sm-4">
           <input type="number" class="form-control"min="0" max="64"name="place" >
         </div>
       </div>
       <div><p>Prix allant  {{ $show->prix }} selon la place</p><br>
        <p>Type d'evenement : {{ $cat}}</p>

       </div>
       <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Reservation</button>
        </div>
      </div>

    </form>


    <div class="col-md-10">
     <div class="col-md-5">
      <p class="text-muted">{{ $show->descriptif }}</p>
    </div>
    <div>
      <p>  {{ dump($show) }}</p>
    </div>

  </div>
</div>
</section>
</div>



@endsection
