<?php

namespace App\Http\Controllers;

class RepresentationController extends Controller {

	public function index() {

		$ListUrl = 'https://api.theatredelaville-paris.com/events';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);
		dump(count($arr));
		foreach ($arr as $key) {

			foreach ($key["arrayDates"] as $k => $value) {

/*
if (is_array($value)) {
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

$r1->save();
$r2->save();
} else {
$r1 = new Representation();
$date1 = new \DateTime($value);
$r1->when = date_format($date1, 'Y-m-d H:i:s');
$show_id = Show::where('titre', $key["name"])->pluck('id')->first();
$r1->show_id = $show_id;
$location_id = Show::where('titre', $key["name"])->pluck('location_id')->first();
$r1->location_id = $location_id;
$r1->save();
}
 */
			}

		}

	}
}
