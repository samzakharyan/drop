<?php

namespace App\Http\Controllers;

use App\Http\Services\ShopifyService;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Session;

class ShopController extends Controller
{

//    public $api_scopes = 'write_orders,read_customers,write_content,write_products';
    public function addShop() {
        return view('shop.add');
    }

    public function makeShop(Request $request) {
        request()->validate([
            'shopify_url' => 'required|url',
            'redirect_url' => 'required|url',
            'api_key' => 'required',
            'api_secret_key' => 'required',
        ]);
        $add_shop = Shop::shopInsert($request->all());
        if (!$add_shop['status']) {
            return redirect()->back()->with($add_shop);
        }
//        dd($add_shop);
//        $this->set_last_id($add_shop['last_id']);
        setcookie('id', $add_shop['last_id']); // 86400 = 1 day
        ShopifyService::connect($request->all());
    }

    public function redirect(Request $request) {
        ShopifyService::redirection($_COOKIE['id'], $request->code);
    }

}
