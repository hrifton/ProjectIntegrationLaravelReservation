<?php

namespace App\Http\Controllers;

use App\listePieces;
use Illuminate\Http\Request;

class ListePiecesController extends Controller
{
    public function index(){
        $ListUrl='https://api.theatredelaville-paris.com/events';
       $maps_json= file_get_contents($ListUrl);
       $arr=json_decode($maps_json);



        return view('piece.listPiece')->with('maps_json',$arr);
    }
}
