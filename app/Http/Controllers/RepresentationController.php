<?php

namespace App\Http\Controllers;
use App\Representation;

class RepresentationController extends Controller {
//--------------------admin
	public function miseajourRep() {

		$rep = new Representation();
		$rep->injectApi();

	}

}
