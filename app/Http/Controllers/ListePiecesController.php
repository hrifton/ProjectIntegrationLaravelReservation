<?php

namespace App\Http\Controllers;

use App\CategorieSpectacle;
use App\ListePiece;
use App\Location;

class ListePiecesController extends Controller {
	public function index() {
		$ListUrl = 'https://api.theatredelaville-paris.com/events';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);

		$arr = collect($arr["hydra:member"]);

		foreach ($arr as $key) {
			//dd($key);
			$p = new ListePiece();
			$p->name = $key['name'];
			$p->categorie = CategorieSpectacle::where('categorie', $key["mainCategory"]["name"])->pluck('id')->first();
			$p->image = $key["image"]["contentUrl"]["medium"];
			$p->place = Location::where('designation', reset($key["placesNames"]))->pluck('id')->first();
			$p->ticket = $key["ticketingOpen"];
			$p->save();
		}

		/*
			       for($i=0;$i<count($arr["hydra:member"])){
			        $l1= new ListePiecesController();

			        $l1->name=$arr["hydra:member"][$i]["name"];
			        $l1->desc=$arr["hydra:member"][$i]["excerpt"];

			       }
		*/

		return view('piece.listPiece')->with('maps_json', $arr);
	}
}
