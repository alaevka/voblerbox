<?php
namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;

class Orders extends Eloquent
{
	protected $fillable = ['user_id', 'box_id', 'balance_id', 'lure_id'];

	protected $collection = 'orders';

	public function box()
    {
        return $this->hasOne('App\Models\Box', '_id', 'box_id');
    }

    public function lure()
    {
        return $this->hasOne('App\Models\Lures', '_id', 'lure_id');
    }

}