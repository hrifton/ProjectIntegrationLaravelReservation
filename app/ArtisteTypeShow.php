<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtisteTypeShow extends Model {
	public $table = 'artiste_type_show';

	public function apiArtisteTypeShow($id) {

		foreach ($id as $key) {
			$url = 'https://api.theatredelaville-paris.com' . $key;
			$json = file_get_contents($url);
			$json = json_decode($json, true);
			$art = collect($json);

			foreach ($art["performers"] as $a) {

				$n = new Artiste();
				if (isset($a["people"][0]["name"])) {
					$n->saveArtiste($a["people"][0]["name"], $a["people"][0]["familyName"]);
					$tabArt = [$a["people"][0]["name"], $a["people"][0]["familyName"], $a["name"]];
				}
			}
			$t = new TypeArtiste();
			$t->Check_Type_Artiste($tabArt);
		}
		/*verifie si chaque element de l'api est dans la db si elle n'y est pas on la sauvegarde
			$url = 'https://api.theatredelaville-paris.com' . $id['@id'];
			$json = file_get_contents($url);
			$json = json_decode($json, true);
			$art = collect($json);
			dump($art);

			foreach ($art["mainPerformers"] as $k => $s) {
				$ats = new ArtisteTypeShow();

				if (isset($s["people"][0])) {
					$ats->show_id = Show::where('titre', $art["name"])->pluck('id')->first();

					$idartiste = Artiste::where('slug', $s["people"][0]["name"] . $s["people"][0]["familyName"])->pluck('id')->first();
					if ($idartiste == NULL) {

						$a = new Artiste();
						$a->saveArtiste($s["people"][0]["name"], $s["people"][0]["familyName"]);

						$idartiste = Artiste::where('slug', $s["people"][0]["name"] . $s["people"][0]["familyName"])->pluck('id')->first();
					}

					$ats->artiste_type_id = (TypeArtiste::where("artiste_id", $idartiste)->pluck('id')->first()) ? TypeArtiste::where("artiste_id", $idartiste)->pluck('id')->first() : 1;
					dump($ats);
		*/

	}
}
