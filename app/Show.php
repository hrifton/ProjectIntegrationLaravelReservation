<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model {
	//public $table ="shows";

public function connectApi(){
	$ListUrl = 'https://api.theatredelaville-paris.com/events';
	$maps_json = file_get_contents($ListUrl);
	$arr = json_decode($maps_json, true);
	$arr = collect($arr["hydra:member"]);
	return $arr;

}

/*
	public function Model_Show_maj_Api() {
		$ListUrl = 'https://api.theatredelaville-paris.com/events';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);

		if ($arr->count() > Show::count()) {
			foreach ($arr as $key) {

				if (Show::where('titre', $key['name'])->first() == null) {

					//requete api par id de l'event plus complet
					$req = 'https://api.theatredelaville-paris.com' . $key["@id"];
					$fJson = file_get_contents($req);
					$arr1 = json_decode($fJson, true);
					$this->saveShow($arr1, $key);

					$tabShow[] = $arr1['@id'];

				}
			}
		}
		//$tArtShow = new ArtisteTypeShow();
		//$tArtShow->apiArtisteTypeShow($tabShow);
	}*/

	public function saveShow($array) {
		$this->titre = $array['name'];
		$this->descriptif = $array["review"]["reviewBody"];
		$this->prix = $array["priceRange"];
		$this->artistes = $array["additionalRoles"];
		$this->categorie_id = (CategorieSpectacle::where('categorie', $array["mainCategory"]["name"])->pluck('id')->first()) ? CategorieSpectacle::where('categorie', $array["mainCategory"]["name"])->pluck('id')->first() : 1;
		$this->slug = $this->titre . $this->categorie_id;
		$this->poster_url = $array["image"]["contentUrl"]["medium"];
		$this->location_id = Location::where('designation', reset($array["placesNames"]))->pluck('id')->first();
		$this->bookable = $array["ticketingOpen"];
		$this->save();
	}

	public function addShow($id){
		
		$req = 'https://api.theatredelaville-paris.com' . $id->id;
		$fJson = file_get_contents($req);
		$arr1 = json_decode($fJson, true);
		
		
		//ajout de categorie
		$cat=new CategorieSpectacle();
		$cat->ConnectApiCat($arr1["mainCategory"]["@id"]);
		
		//ajoute de localité qui ajoutera le nom et l'adresse du lieu111
		$locality=new Localitie();
		$locality->ConnectApiLocality($arr1);



		//sauvegard du Show
		$this->saveShow($arr1);
				

	}
}
