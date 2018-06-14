<?php

namespace App\Http\Controllers;

use App\CategorieSpectacle;
use App\Representation;
use App\Show;

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
		$representation = Representation::where('show_id', $show->id)->pluck('when')->all();
		$cat = CategorieSpectacle::where('id', $show->categorie_id)->pluck('categorie')->first();
		return view('shows.show')->with(["show" => $show, "representations" => $representation, "cat" => $cat]);
	}

	public function adminApi(){
		$a=new Show();
		$a=$a->connectApi();		
		return view('admin.admin')->with('arr',$a);
	}

	public function addShow(){
		$show=new Show();
		$show->addShow(request());
		return redirect ('/admin');
	}

	
 }