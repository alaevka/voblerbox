<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\Http\Controllers\Controller;

class SiteController extends Controller {

	public function getIndexPage() {

		return view('site.index_page');
	}

}