<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public function variants()
	{
		return $this->hasMany('App\ServiceVariant');
	}
}
