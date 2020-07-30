<?php
namespace App\Http\Services;

class ShopifyService {

	public static function connect($params) {
//		$response = array();
//		if (is_null($shop_url) || is_null($api_key) || is_null($api_secret_key) || is_null($api_redirect_uri) || is_null($api_scopes)) {
//			$response = [
//				'status' => false,
//				'message' => 'Wrong Field'
//			];
//			return $response;
//        $shop_url = null, $api_key = null, $api_secret_key = null, $api_redirect_uri = null, $api_scopes = null
//		}

        // Build install/approval URL to redirect to
		$install_url = $params['shopify_url'] . "/admin/oauth/authorize?client_id=" . $params['api_key'] . "&scope=write_orders,read_customers,write_content,write_products&redirect_uri=" . urlencode($params['redirect_url']);
		// Redirect
		header("Location: " . $install_url);
		die();
	}

    public static function redirection($params) {
        $access_token_url = "https://" . $params['shopify_url'] . "/admin/oauth/access_token";
        $query = array(
            "client_id" => $params['api_key'], // Your API key
            "client_secret" => $params['api_secret_key'], // Your app credentials (secret key)
            "code" => $params['code'] // Grab the access key from the URL
        );
        // Configure curl client and execute request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $access_token_url);
        curl_setopt($ch, CURLOPT_POST, count($query));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
        $result = curl_exec($ch);
        dd($result);
        curl_close($ch);
        $result = json_decode($result, true);
        $access_token = $result['access_token'];
        dd($access_token);

    }
}