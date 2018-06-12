<?php

namespace App\Http\Controllers;

use App\Artiste;

class ArtisteTypeShowController extends Controller {

//lsite les artistes
	public function index() {

		
		return view();
	}

//affiche le formulaire
	public function create() {
		return view();
	}

//enregistrer l'artiste
	public function store(Request $request) {


		return ;

	}

//recupere donne dans un formulaire
	public function edit($id) {
		

		return view();
	}

//modifier un artiste
	public function update(Request $request, $id) {

		

		return redirect();
	}

//suppression de l'artiste (archive "activer/desactiver")
	public function destroy(Request $request, $id) {


		return redirect();
	}
}
