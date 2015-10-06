<?php
namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;

class Box extends Eloquent
{
	protected $fillable = ['title', 'price'];

	protected $collection = 'box';

}