<?php

namespace App\Http\Controllers;

use App\ListePiece;
use Illuminate\Http\Request;


class ListePiecesController extends Controller
{
    public function index(){
        $ListUrl='https://api.theatredelaville-paris.com/events';
       $maps_json= file_get_contents($ListUrl);
       $arr=json_decode($maps_json,true);
       $arr=collect($arr["hydra:member"]);

            dd($arr);

       foreach ($arr as $key) {
        $p=new ListePiece(); 
        $p->name=$key['name'];
        $p->
        
         // dd($p->);
       }



       /*
       for($i=0;$i<count($arr["hydra:member"])){
        $l1= new ListePiecesController();

        $l1->name=$arr["hydra:member"][$i]["name"];
        $l1->desc=$arr["hydra:member"][$i]["excerpt"];
 
       }
       */
      

       // return view('piece.listPiece')->with('maps_json',$arr);
    }
}
