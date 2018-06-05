@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{route('va')}}" method="post">

                    {{ csrf_field() }}


                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" name="nom" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom" class="form-control">
                </div>


                <div class="form-group">
                    <label for=""></label>
                    <input type="submit" class="form-control btn btn-primary" value="Enregistrer">
                </div>

            </form>

        </div>
    </div>
</div>


@endsection