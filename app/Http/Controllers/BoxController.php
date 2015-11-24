<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class BoxController extends Controller {

	public function getBox($id) {

		$box = \App\Models\Box::find($id);
		if(!$box)
			abort(404);
		$lures = \App\Models\Lures::where('box_id', '=', $id)->get();
		return view('site.box_page', ['box' => $box, 'box_lures' => $lures]);
	}

	public function postRoulette(Request $request) {
	    if ($request->ajax()) {
	        $box = \App\Models\Box::find($request->input('box_id'));
	        $balance = new \App\Models\UserBalance;
	        $balance->value = $box->price;
	        $balance->user_id = Auth::user()->_id;
	        $balance->param = 0;
	        $balance->save();

	        //generate win item position
	        $win_position = $this->_generateWinPosition($box);
	        //calculate new user balance
	        if(Auth::user()->getBalance() < $box->price) {
	        	$show_roulette_button = false;
	        } else {
	        	$show_roulette_button = true;
	        }

	        return response()->json(['win_position' => $win_position, 'show_roulette_button' => $show_roulette_button]);
	    } else {
	    	abort(400);
	    }
	    
    }

    /*
		generate win item number
    */
    private function _generateWinPosition($box_object) {
    	return 1;
    }


}