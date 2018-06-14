<?php

namespace App; 

use Illuminate\Database\Eloquent\Model; 

class Localitie extends Model {

public function ConnectApiLocality($id) {

    $ListUrl = 'https://api.theatredelaville-paris.com'.$id["dates"][0]["place"]["@id"];
	$maps_json = file_get_contents($ListUrl); 
	$arr = json_decode($maps_json, true); 
	$this->saveLocalitie($arr); 
}

public function saveLocalitie($arr){
    if(!Localitie::where('postal_code',$arr["address"]["postalCode"])->first()){
    $this->postal_code=$arr["address"]["postalCode"];
    $this->locality=$arr["address"]["addressLocality"];
    $this->save();}
    $location=new Location();
    $location->saveLocation($arr);
}
}
