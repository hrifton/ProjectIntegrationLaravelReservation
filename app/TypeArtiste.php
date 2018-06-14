<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeArtiste extends Model {

	public function Check_Type_Artiste($tabArt) {
		dump($tabArt);
		foreach ($tabArt as $key) {
			dd($key[2]);
			$tabArt[2] = $tabArt[2] ? $tabArt[2] : "benevole";
			$type_id = Type::where('type', $tabArt[2])->pluck('id')->first();
			if ($type_id) {

				$typeArt = new TypeArtiste();
				dump("ici");
				dump($tabArt);
				$typeArt->SaveLiaisonTypeArtiste($tabArt);

			} else {
				//ajoute nouveau type d'artiste
				$type = new Type();
				$type->type = $tabArt[2];
				$type->save();
				$typeArt = new TypeArtiste();
				dump("ajoute nouveau type d'artiste");

				$typeArt->SaveLiaisonTypeArtiste($tabArt);

			}
		}
	}

	public function SaveLiaisonTypeArtiste($artiste) {
		dump("artiste");
		dump($artiste);
		$this->artiste_id = Artiste::where('slug', $artiste[0] . $artiste[1])->pluck('id')->first();
		$this->type_id = Type::where('type', $artiste[2])->pluck('id')->first();
		dump($this);
		$this->save();
	}

}
