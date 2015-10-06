<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use DB;
use App\Http\Controllers\Controller;

class SiteController extends Controller {

	public function getIndexPage() {
		$boxes = \App\Models\Box::all();
		return view('site.index_page', ['boxes' => $boxes]);
	}


	public function addBox() {

		for ($i=1; $i <= 12 ; $i++) { 
			$box = new \App\Models\Box;
			$box->title = 'Случайная приманка '.$i;
			$box->price = rand(100, 150);
			$box->save();
		}
		

	}

	public function addLures() {

		for ($i=1; $i <= 18 ; $i++) { 
			$box = new \App\Models\Lures;
			$box->title = 'Название воблера '.$i;
			$box->price = rand(100, 1000);
			$box->box_id = '5613a61a57df56d015000029';
			$box->image = 'vobler.jpg';
			$box->save();
		}
	}

	public function addBalance($id, $value = 100) {

		$balance = new \App\Models\UserBalance;
		$balance->user_id = $id;
		$balance->value = $value;
		$balance->param = 1;
		$balance->save();

		return Redirect::back();
		//return redirect()->route('home');

	}

	public function addRandomLures($id) {

		for ($i=1; $i <= 18 ; $i++) { 
			$box = new \App\Models\Lures;
			$box->title = 'Название воблера '.$i;
			$box->price = rand(100, 1000);
			$box->box_id = $id;
			$box->image = 'vobler.jpg';
			$box->save();
		}
		return redirect()->route('box', ['id' => $id]);
	}
}