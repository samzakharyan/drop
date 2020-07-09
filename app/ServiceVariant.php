<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceVariant extends Model
{
	public function service()
	{
		return $this->belongsTo('App\Service');
	}

	public function getFeaturesAttribute($value)
	{
		$arr = json_decode($value, true);
		if (empty($arr)) {
			$arr = [];
		}
		return $arr;
	}
}
