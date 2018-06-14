<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieSpectacle extends Model
{
   public function ConnectApiCat($id){
    $req = 'https://api.theatredelaville-paris.com' . $id;
		$fJson = file_get_contents($req);
        $arr1 = json_decode($fJson, true);
        
        $this->saveCat($arr1);
   }
public function saveCat($arr){
    if(!CategorieSpectacle::where('categorie',$arr["name"])->first()){
    $this->categorie=$arr["name"];
    $this->save();
    }
}
   
}
