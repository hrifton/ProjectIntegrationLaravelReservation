<?php

namespace App\Http\Controllers;
use App\Location;

class LocationController extends Controller {
//admin
	public function miseajourLocation() {
		$loc = new Location();
		$loc->injectApiLocation();
	}

/*
//lsite les artistes
public function index() {

return view();
}

//affiche le formulaire
public function create() {
return view('');
}

//enregistrer l'artiste
public function store(Request $request) {

return redirect()->route('index')->with('success', "Ajout de l'artiste ok");

}

//recupere donne dans un formulaire
public function edit($id) {

return view('artiste.edit', ['artiste' => $artiste]);
}

//modifier un artiste
public function update(Request $request, $id) {

return redirect('');
}

//suppression de l'artiste (archive "activer/desactiver")
public function destroy(Request $request, $id) {

return redirect('');
}*/
}
