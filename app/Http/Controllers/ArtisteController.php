<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artiste;

class ArtisteController extends Controller
{
//lsite les artistes
public function index(){

    $listArtiste= Artiste::all();
    return view('artiste.index',['artistes'=>$listArtiste]);
}

//affiche le formulaire
public function create(){
return view('artiste.create');
}


//enregistrer l'artiste
public function store(Request $request){
$artiste=new Artiste();

$artiste->nom=$request->input('nom');
$artiste->prenom=$request->input('prenom');

$artiste->save();
return redirect('artistes');

}



//recupere donne dans un formulaire
public function edit($id){
    $artiste=Artiste::find($id);

    return view('artiste.edit',['artiste'=>$artiste]);
}



//modifier un artiste
public function update(Request $request, $id){
    
    $artiste = Artiste::find($id);
    $artiste->nom = $request->input('nom');
    $artiste->prenom = $request->input('prenom');

$artiste->save();

return redirect('artistes');
}





//suppression de l'artiste (archive "activer/desactiver")
public function destroy(Request $request, $id){

    $artiste= Artiste::find($id);

    $artiste ->delete();

    return redirect('artistes');
} 




}
