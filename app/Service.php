<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public function variants()
	{
		return $this->hasMany('App\ServiceVariant');
	}

	public function get($keyword) {
        if (Service::where( 'title', 'LIKE', '%' . $keyword . '%' )->orWhere ( 'description', 'LIKE', '%' . $keyword . '%' )->count() < 10) {
            $services = Service::where( 'title', 'LIKE', '%' . $keyword . '%' )->orWhere ( 'description', 'LIKE', '%' . $keyword . '%' )->get();
        } else {
            $services = Service::where( 'title', 'LIKE', '%' . $keyword . '%' )->orWhere ( 'description', 'LIKE', '%' . $keyword . '%' )->paginate(10);
        }
        return $services;
    }
}
