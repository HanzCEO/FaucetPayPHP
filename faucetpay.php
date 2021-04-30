<?php

class FaucetPay
{
	public $BASE = "https://faucetpay.io/api/";
	public $use_curl = true;
	public $default_array = array(
		'api_key' => ''
	);

	function __construct($api_key, $use_curl=true, $api_version='v1')
	{
		$this->BASE .= $api_version;
		$this->default_array['api_key'] = $api_key;
		$this->use_curl = $use_curl;
	}

	function post_curl($url, $params)
	{
		$ch = curl_init($url);
		curl_setopt_array($ch, array(
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $params,
				CURLOPT_RETURNTRANSFER => true
		));

		$data = curl_exec($ch);
		curl_close($ch);
		return json_decode($data, true);
	}

	function post_no_curl($url, $params)
	{
		$postdata = http_build_query(
			$params
		);

		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			)
		);

		$context  = stream_context_create($opts);

		$result = file_get_contents($url, false, $context);
		return json_decode($result, true);
	}

	function __call($method, $arguments)
	{
		// TODO: When named arguments widely used, i will implement here
		$response = array();
		$test = end($arguments) == 1;
		$arguments = array_merge($this->default_array, $arguments[0]);

		if ($this->use_curl)
		{
			$response = $this->post_curl("{$this->BASE}/$method", $arguments);
		}
		else
		{
			$response = $this->post_curl("{$this->BASE}/$method", $arguments);
		}

		if ($test)
		{
			echo "Calling: <b>{$this->BASE}/$method</b><br/>
			      <h3>Arguments</h3>";
			echo "<pre>" . print_r($arguments, true) . "</pre>";
			echo "<br/><h3>Response</h3>";
			echo "<pre>" . print_r($response, true) . "</pre>";
		}

		return $response;
	}
}

 ?>
