<?php

namespace App\Http\Controllers;

use App\Http\Services\ShopifyService;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public $shopify_url;
    public $shopify_api_key;
    public $shopify_api_secret;
    public $redirect_url;
    public $api_scopes = 'write_orders,read_customers,write_content,write_products';

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
        $select_lastest = Shop::getLastestShop($add_shop['last_id']);
        if(count($select_lastest) == 0) {
            return redirect()->back()->with('404', 'Shop not found!');
        }
        ShopifyService::connect($request->all());
        $select_lastest['code'] = $request->code;
        ShopifyService::redirection($select_lastest);

//        $this->shopify_url = $request->shopify_url;
//        $this->redirect_url = $request->redirect_url;
//        $this->api_key = $request->api_key;
//        $this->shopify_api_secret = $request->api_secret_key;
//        $connect = ShopifyService::connect($this->shopify_url, $this->api_key, $this->shopify_api_secret, $this->redirect_url, $this->api_scopes);
    }
}
