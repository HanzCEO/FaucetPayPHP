# FaucetPayPHP
The most size efficient (lightweight) and beginner friendly FaucetPay API client in PHP, suitable for clever developers and webmasters

# Get Started
1. Download the script
```sh
wget https://github.com/HanzHaxors/FaucetPayPHP/raw/main/faucetpay.php
```
2. Attach in your project
```php
include('./faucetpay.php');
```
3. Use the library (this is the example)
```php
$fp = new FaucetPay('MY_API_KEY');
$method = $_GET['m'];

$fp->$method(
	$_GET, // An array of parameters without api_key
	true // Print test page
);

$response = $fp->send(
	array(
		"currency" => "BTC",
		"amount" => 100,
		"to" => "1HeadlkM24Jac..."
	)
);
print_r($response);
```

# End Notes
Thank you for visiting this page! Appreciate my works by Following, being a Stargazer, Contribute to the project or Donate me via cryptocurrency down below

BTC, ETH, LTC, BCH, DASH, DGB, FEY via FaucetPay (username: Hanz)<br/>
WAVES : use alias (hanz, hanzhaxors, haxors)
