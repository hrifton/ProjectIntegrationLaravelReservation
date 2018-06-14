<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artiste extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];
	// champ sur les quels nous pouvont faire insert
	protected $fillable = ['nom', 'prenom'];

	public function saveArtiste($nom, $prenom) {

		if (Artiste::where('slug', $nom . $prenom)->first() == null) {
			$a = new Artiste();
			$a->nom = $nom;
			$a->prenom = $prenom;
			$a->slug = $nom . $prenom;
			$a->save();

		} else {
			echo "deja dans la db";

		}
	}

	public function apiArtiste() {

		$ListUrl = 'https://api.theatredelaville-paris.com/people';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);
		//insertion de nouveau artiste via api
		foreach ($arr as $key) {
			$ArtisteUrl = 'https://api.theatredelaville-paris.com' . $key['@id'];
			$fJson = file_get_contents($ArtisteUrl);
			$art = json_decode($fJson, true);

			if (!Artiste::where('slug', $art["name"] . $art["familyName"])->first()) {
				$a = new Artiste();
				$this->saveArtiste($art["name"], $art["familyName"]);
				$tabArt[] = [$art["name"], $art["familyName"], $art["jobTitle"]];
			}
		}
		if (isset($tabArt)) {
			$typeArt = new TypeArtiste();
			$typeArt->Check_Type_Artiste($tabArt);

		}

	}
}
