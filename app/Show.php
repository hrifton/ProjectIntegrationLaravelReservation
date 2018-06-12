<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model {
	//public $table ="shows";

	public function Model_Show_maj_Api() {
		$ListUrl = 'https://api.theatredelaville-paris.com/events';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);

		if ($arr->count() > Show::count()) {
			foreach ($arr as $key) {

				$a = new ArtisteTypeShow();
				$a->apiArtisteTypeShow($key["@id"]);
				if (Show::where('titre', $key['name'])->first() == null) {

					//requete api par id de l'event plus complet
					$req = 'https://api.theatredelaville-paris.com' . $key["@id"];

					$fJson = file_get_contents($req);
					$arr1 = json_decode($fJson, true);

					$p = new Show();
					$p->titre = $key['name'];
					$p->descriptif = $arr1["review"]["reviewBody"];
					$p->prix = $arr1["priceRange"];
					$p->artistes = $arr1["additionalRoles"];
					$p->categorie_id = (CategorieSpectacle::where('categorie', $key["mainCategory"]["name"])->pluck('id')->first()) ? CategorieSpectacle::where('categorie', $key["mainCategory"]["name"])->pluck('id')->first() : 1;
					$p->slug = $p->titre . $p->categorie_id;
					$p->poster_url = $key["image"]["contentUrl"]["medium"];
					$p->location_id = Location::where('designation', reset($key["placesNames"]))->pluck('id')->first();
					$p->bookable = $key["ticketingOpen"];

					$p->save();

				}
			}
		}
	}
}
