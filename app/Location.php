<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
	
public function saveLocation($arr){
	if(!Location::where('slug',$arr["name"].$arr["address"]["streetAddress"])->first()){
	$this->designation= $arr["name"];
	$this->adresse=$arr["address"]["streetAddress"] ;
	$this->slug= $this->designation.$this->adresse;
	$this->locality_id=Localitie::where('postal_code',$arr["address"]["postalCode"])->pluck('id')->first();
	$this->save();
	}
}

}
