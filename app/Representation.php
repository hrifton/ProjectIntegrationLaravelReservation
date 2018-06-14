<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representation extends Model {
/*
	public function injectApi() {

		$ListUrl = 'https://api.theatredelaville-paris.com/events';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);

		foreach ($arr as $key) {
			//dd($key);
			foreach ($key["arrayDates"] as $k => $value) {
				$rep = new Representation();
				//dump($value);
				if (is_array($value)) {
					dump('si tableau ');
					$rep->saveArrayRepresentation($value, $key);
				} else {
					$rep->saveRepresentation($value, $key);
				}

			}

		}
	}

	public function saveRepresentation($value, $key) {
		$r1 = new Representation();
		$date1 = new \DateTime($value);
		$r1->when = date_format($date1, 'Y-m-d H:i:s');
		$show_id = Show::where('titre', $key["name"])->pluck('id')->first();
		$r1->show_id = $show_id;
		$location_id = Show::where('titre', $key["name"])->pluck('location_id')->first();
		$r1->location_id = $location_id;
		$r1->slug = $r1->when . $r1->show_id . $r1->location_id;
		if (Representation::where('slug', $r1->slug)->first() == null) {
			dump($r1);
			$r1->save();}
	}
	public function saveArrayRepresentation($value, $key) {
dump('function tableau save');
		$r1 = new Representation();
		$r2 = new Representation();
		$date1 = new \DateTime($value[0]);
		$r1->when = date_format($date1, 'Y-m-d H:i:s');
		$date2 = new \DateTime($value[1]);
		$r2->when = date_format($date2, 'Y-m-d H:i:s');
		$show_id = Show::where('titre', $key["name"])->pluck('id')->first();
		$r1->show_id = $show_id;
		$r2->show_id = $show_id;
		$location_id = Show::where('titre', $key["name"])->pluck('location_id')->first();
		$r1->location_id = $location_id;
		$r2->location_id = $location_id;
		$r1->slug = $r1->when . $r1->show_id . $r1->location_id;
		$r2->slug = $r2->when . $r2->show_id . $r2->location_id;
		dump((Representation::where('slug', $r1->slug)->first()));
		if (Representation::where('slug', $r1->slug)->first() == null) {
			$r1->save();}
		if (Representation::where('slug', $r2->slug)->first() == null) {
			$r2->save();}
	}

	public function getRepDB($id){
		$rep=Representation::where('show_id',$id)->get();
	return $rep;
	}*/
}
