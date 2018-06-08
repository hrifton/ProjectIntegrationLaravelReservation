<?php

namespace App\Http\Controllers;
use App\CategorieSpectacle;
use Illuminate\Http\Request;

class CategorieSpectacleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$ListUrl = 'https://api.theatredelaville-paris.com/taxons';
		$maps_json = file_get_contents($ListUrl);
		$arr = json_decode($maps_json, true);
		$arr = collect($arr["hydra:member"]);
		dump($arr);
		if (count($arr) > CategorieSpectacle::count()) {
			foreach ($arr as $key) {
				if (CategorieSpectacle::where('categorie', $key["name"])->first() == null) {
					$c = new CategorieSpectacle();
					$c->categorie = $key["name"];
					$c->save();}
			}
		} else {
			echo "rien a rajouté";
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\CategorieSpectacle  $CategorieSpectacle
	 * @return \Illuminate\Http\Response
	 */
	public function show(CategorieSpectacle $CategorieSpectacle) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\CategorieSpectacle  $CategorieSpectacle
	 * @return \Illuminate\Http\Response
	 */
	public function edit(CategorieSpectacle $CategorieSpectacle) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\CategorieSpectacle  $CategorieSpectacle
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, CategorieSpectacle $CategorieSpectacle) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\CategorieSpectacle  $CategorieSpectacle
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(CategorieSpectacle $CategorieSpectacle) {
		//
	}
}
