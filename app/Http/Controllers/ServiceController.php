<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ShopifyService;
use App\Service;
class ServiceController extends Controller
{
    public function index() {
		return view('service/index');
	}

	public function create($serviceId) {
		$service = \App\Service::findOrFail($serviceId);

		return view('service/create', [
			'service' => $service,
			'variants' => $service->variants
		]);
	}

	public function get(Request $request) {
		$services = Service::get($request->keyword);
		return view('service.search', compact('services'));
	}

    public function addShop() {
		return view('shop.add');
	}

    public function makeShop(Request $request) {
        request()->validate([
            'shopify_url' => 'required|url',
            'redirect_url' => 'required|url',
            'api_key' => 'required',
            'api_secret_key' => 'required',
//            'api_scopes' => 'required'
        ]);
//        dd($request->all());
        $this->shopify_url = $request->shopify_url;
        $this->redirect_url = $request->redirect_url;
        $this->api_key = $request->api_key;
        $this->shopify_api_secret = $request->api_secret_key;
        $connect = ShopifyService::connect($request->all());
    }

    public function redirection(Request $request) {
        $access_token_url = "https://" . $request->shop . "/admin/oauth/access_token";
        $query = array(
            "client_id" => $this->shopify_api_key, // Your API key
            "client_secret" => $this->shopify_api_secret, // Your app credentials (secret key)
            "code" => $request->code // Grab the access key from the URL
        );
        dd($query);
        // Configure curl client and execute request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $access_token_url);
        curl_setopt($ch, CURLOPT_POST, count($query));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
        $result = curl_exec($ch);
        curl_close($ch);
        dd($result);
	}
}
