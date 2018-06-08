<?php

namespace App\Http\Controllers;

use App\Location;

class LocationController extends Controller {
	public function index() {
		$ListUrl = 'https://api.theatredelaville-paris.com/places';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = $arr["hydra:member"];
		$taille_arr = count($arr);
		$DB = Location::get();
		$tailleLgDB = count($DB);
		/**verification de la taille de la DB et les info de l'API
			            si API plus grand insertion des nouvelles données**/
		if ($taille_arr > $tailleLgDB) {
			foreach ($arr as $key) {

				if (Location::where('designation', $key['name'])->first() == null);
				$l = new Location();
				$l->designation = $key["name"];
				$adres = $key["address"]["streetAddress"];
				$l->adresse = ($adres);
				$idCodePost = Localitie::where('postal_code', $key["address"]["postalCode"])->pluck("id")->first();
				$l->slug = $l->designation . $adres;
				$l->locality_id = $idCodePost;
				$l->save();

			}
		} else {
			echo "rien a rajouté";
		}
	}
}
