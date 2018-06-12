<?php

namespace App\Http\Controllers;

use App\Type;

class TypeController extends Controller {
	public function index() {
		$ListUrl = 'https://api.theatredelaville-paris.com/roles';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);
		//	dd($arr);

		$arr->each(function ($role) {
			if (Type::where('type', $role["name"])->first() == null) {
				$t = new Type();
				$t->type = $role["name"];
				$t->save();}
		});

	}
}
