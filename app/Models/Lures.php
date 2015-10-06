<?php
namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;

class Lures extends Eloquent
{
	protected $fillable = ['title', 'price', 'image', 'box_id'];

	protected $collection = 'lures';

}