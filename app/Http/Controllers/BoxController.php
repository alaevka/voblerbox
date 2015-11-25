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

	        //store it
	        $orders = new \App\Models\Orders;
	        $orders->user_id = Auth::user()->_id;
	        $orders->box_id = $box->_id;
	        $orders->lure_id = '56142a8e4c2e9872da0041a9';
	        $orders->balance_id = $balance->_id;
	        $orders->save();


	        //calculate new user balance
	        if(Auth::user()->getBalance() < $box->price) {
	        	$show_roulette_button = false;
	        	$route_update_balance = route('addbalance', ['id' => Auth::user()->_id, 'value' => 100]);
	        	$balance_line = "У вас не достаточно баланса, для открытия коробки! <a href=".$route_update_balance.">пополнить баланс на 100 рублей</a>";
	        } else {
	        	$show_roulette_button = true;
	        	$balance_line = null;
	        }

	        return response()->json(['balance_line' => $balance_line, 'win_position' => $win_position, 'show_roulette_button' => $show_roulette_button]);
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