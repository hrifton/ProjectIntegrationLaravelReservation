@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Artistes</h1>
            <div class="pull-left">
                    <a href="{{route('fa')}}">Nouvelle Artiste</a>
                </div>
            <table class="table">
                <head>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date Creation</th>
                    <th>Date derniere modification</th>
                    <th>Actions</th>
                </tr>
                </head>
                <body>
                    @foreach ($artistes as $artiste )


                    <tr>
                        <td>{{$artiste->nom}}</td>
                        <td>{{$artiste->prenom}}</td>
                        <td>{{$artiste->created_at}}</td>
                        <td>{{$artiste->updated_at}}</td>

                           <td>
                        <form action="{{url('artistes/'.$artiste->id)}}" method="post">
                        {{csrf_field() }}
                        {{method_field('DELETE')}}
                        <a href=""class="btn btn-primary">Afficher</a>
                        <a href="{{url('artistes/'.$artiste->id.'/edit')}}"class="btn btn-default">Editer</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                       </form>

                        </td>
                    </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
</div>
</div>

@endsection
