<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shopify_url', 'api_key', 'api_secret_key'];

    public static function shopInsert($params = array()) {
        $response = array();
        $create = self::create([
            'shopify_url' => $params['shopify_url'],
            'api_key' => $params['api_key'],
            'api_secret_key' => $params['api_secret_key']
        ]);
        if (!$create) {
            return $response = ['status' => 0, 'msg' => 'Not Inserted'];
        }
        return $response = ['status' => 1, 'last_id' => $create->id];
    }

    public static function getLastestShop($last_id) {
        return self::select()->where('id', $last_id)->first()->toArray();
    }
}
