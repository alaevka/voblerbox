<?php
namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;

class UserBalance extends Eloquent
{
	protected $fillable = ['user_id', 'value', 'param'];

	protected $collection = 'balance';

}