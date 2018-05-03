@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{url('artistes/'.$artiste->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}


                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{$artistes->nom}}">
                </div>

                <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom" class="form-control" value="{{$artiste->prenom}}">
                </div>


                <div class="form-group">
                    <label for=""></label>
                    <input type="submit" class="form-control btn btn-danger" value="Modifier">
                </div>

            </form>

        </div>
    </div>
</div>


@endsection