<?php

namespace App\Http\Controllers;

use App\CategorieSpectacle;
use App\Location;
use App\Show;

class ShowController extends Controller {
	public function index() {
		$ListUrl = 'https://api.theatredelaville-paris.com/events';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);

		$arr = collect($arr["hydra:member"]);

		if (count($arr) > Show::count()) {
			foreach ($arr as $key) {
				if (Show::where('titre', $key['name'])->first() == null) {
					$p = new Show();

					$p->titre = $key['name'];
					$p->categorie_id = CategorieSpectacle::where('categorie', $key["mainCategory"]["name"])->pluck('id')->first();
					$p->slug = $p->titre . $p->categorie_id;
					$p->poster_url = $key["image"]["contentUrl"]["medium"];
					$p->location_id = Location::where('designation', reset($key["placesNames"]))->pluck('id')->first();
					$p->bookable = $key["ticketingOpen"];
					$p->save();

				}
			}
		} else {echo "rien a rajouté";}

/*
for($i=0;$i<count($arr["hydra:member"])){
$l1= new ListePiecesController();

$l1->name=$arr["hydra:member"][$i]["name"];
$l1->desc=$arr["hydra:member"][$i]["excerpt"];

}
 */

		//return view('piece.listPiece')->with('maps_json', $arr);
	}
}
