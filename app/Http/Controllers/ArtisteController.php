<?php

namespace App\Http\Controllers;

use App\Artiste;
use App\Type;
use App\TypeArtiste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtisteController extends Controller {

	

	//lsite les artistes
	public function index() {

		$listArtiste = DB::table('artistes')->where('deleted_at', null)->get();

		return view('artiste/index')->with('artistes', $listArtiste);
	}

//affiche le formulaire
	public function create() {
		return view('artiste.create');
	}

//enregistrer l'artiste
	public function store(Request $request) {

		$parametre = $request;

		$artiste = new Artiste();

		$artiste->nom = $request->input('nom');
		$artiste->prenom = $request->input('prenom');
		$artiste->save();

		return redirect()->route('index')->with('success', "Ajout de l'artiste ok");

	}

//recupere donne dans un formulaire
	public function edit($id) {
		$artiste = Artiste::find($id);

		return view('artiste.edit', ['artiste' => $artiste]);
	}

//modifier un artiste
	public function update(Request $request, $id) {

		$artiste = Artiste::find($id);
		$artiste->nom = $request->input('nom');
		$artiste->prenom = $request->input('prenom');

		$artiste->save();

		return redirect('artistes');
	}

//suppression de l'artiste (archive "activer/desactiver")
	public function destroy(Request $request, $id) {

		$artiste = Artiste::find($id);

		$artiste->delete();

		return redirect('artistes');
	}

	public function api() {

		$ListUrl = 'https://api.theatredelaville-paris.com/people';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);
		//dd($arr);
		//insertion de nouveau artiste via api
		foreach ($arr as $key) {

			if (!Artiste::where('slug', $key["name"] . $key["familyName"])->first()) {
				$t = new TypeArtiste();
				$a = new Artiste();
				$a->nom = $key["name"];
				$a->prenom = $key["familyName"];
				$a->slug = $a->nom . $a->prenom;
				$a->save();
				//insertion table de liaison type_artiste
				$t->artiste_id = Artiste::where('slug', $a->slug)->pluck('id')->first();
				$t->type_id = (Type::where('type', $key["jobTitle"])->pluck('id')->first()) ? Type::where('type', $key["jobTitle"])->pluck('id')->first() : 1;
				$t->save();

			}
		}

	}

}
