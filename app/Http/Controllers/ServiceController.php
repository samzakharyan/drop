<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
	public function index()
	{
		return view('service/index');
	}

	public function create($serviceId)
	{
		$service = \App\Service::findOrFail($serviceId);

		return view('service/create', [
			'service' => $service,
			'variants' => $service->variants
		]);
	}

	public function test() {

    }
}
