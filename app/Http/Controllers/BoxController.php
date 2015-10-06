<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoxController extends Controller {

	public function getBox($id) {
		$box = \App\Models\Box::find($id);
		$lures = \App\Models\Lures::where('box_id', '=', $id)->get();
		return view('site.box_page', ['box' => $box, 'box_lures' => $lures]);
	}

	public function postRoulette(Request $request) {
	    if ($request->isMethod('post')) {
	        $box = \App\Models\Box::find($request->input('box_id'));
	        $balance = new \App\Models\UserBalance;
	        $balance->value = $box->price;
	        $balance->user_id = Auth::user()->_id;
	        $balance->param = 0;
	        $balance->save();
	    } else {
	    	return redirect()->route('home');
	    }
	    
    }


}