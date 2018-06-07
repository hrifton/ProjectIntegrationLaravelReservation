<?php

namespace App\Http\Controllers;
use App\Localitie;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class LocationController extends Controller
{
    public function index (){
        $ListUrl='https://api.theatredelaville-paris.com/places';
        $maps_json= file_get_contents($ListUrl);
        $arr=json_decode($maps_json,true);
        $arr=$arr["hydra:member"];

        //dump($arr);

        foreach ($arr as $key) {
          
           $l = new Location();
            //nom du lieu
          $l->designation=$key["name"];
          
           //rue
           $adres=$key["address"]["streetAddress"];
           //dump($adres);
           $l->adresse=($adres);
          //codePostal
          $idCodePost=Localitie::where('postal_code', $key["address"]["postalCode"])->pluck("id")->first();
          $l->slug=$l->designation.$adres;
          $l->locality_id= $idCodePost;
           // dd($l->adresse);
            
           $l->save();
       
           
        }
    }
}
