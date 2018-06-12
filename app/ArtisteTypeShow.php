<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtisteTypeShow extends Model {
	public $table = 'artiste_type_show';

	public function apiArtisteTypeShow($id) {
		//verifie si chaque element de l'api est dans la db si elle n'y est pas on la sauvegarde
		$url = 'https://api.theatredelaville-paris.com' . $id;
		$json = file_get_contents($url);
		$json = json_decode($json, true);
		$art = collect($json);
		dump($art);

		foreach ($art["mainPerformers"] as $k => $s) {
			$ats = new ArtisteTypeShow();

			if (isset($s["people"][0])) {
				$ats->show_id = Show::where('titre', $art["name"])->pluck('id')->first();
				//dump($s["people"][0]["name"] . "  ->" . $s["people"][0]["familyName"]);
				$idartiste = Artiste::where('slug', $s["people"][0]["name"] . $s["people"][0]["familyName"])->pluck('id')->first();
				if ($idartiste == NULL) {
					//	dump('dans le if');
					$a = new Artiste();
					$a->saveArtiste($s["people"][0]["name"], $s["people"][0]["familyName"]);
					//	dump($s["people"][0]["name"], $s["people"][0]["familyName"]);
					$idartiste = Artiste::where('slug', $s["people"][0]["name"] . $s["people"][0]["familyName"])->pluck('id')->first();
				}

				$ats->artiste_type_id = (TypeArtiste::where("artiste_id", $idartiste)->pluck('id')->first()) ? TypeArtiste::where("artiste_id", $idartiste)->pluck('id')->first() : 1;
				//	dump($ats->artiste_type_id);
				$ats->save();

				//dump($art["name"] . "  -  " . $s["people"][0]["name"] . " " . $s["people"][0]["familyName"] . " : " . $s["people"][0]["jobTitle"]);
			}
		}
	}
}
