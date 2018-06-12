<?php

namespace App\Http\Controllers;

use App\Show;
use App\Representation;

class ShowController extends Controller {
	public function index() {

		return view('shows.listShows')->with('maps_json', Show::get());

	}

	public function Show_maj_api() {
		$show = new Show;
		$show->Model_Show_maj_Api();
	}

	public function getShow($id) {
		$show = Show::find($id);
		$representation= Representation::where('show_id',$show->id)->pluck('when')->all();
		
		

		return view('shows.show')->with(["show"=>$show,"representations"=>$representation]);
	}
}