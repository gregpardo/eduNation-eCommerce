<?php
// This script makes the actual request of the payment gateway.

// Authorize.net URLs:
if ($live) {
	define ('GATEWAY_API_URL', 'https://secure.authorize.net/gateway/transact.dll');
} else {
	define ('GATEWAY_API_URL', 'https://test.authorize.net/gateway/transact.dll');
}

// Your account info:
$data['x_login'] = '75sqQ96qHEP8';
$data['x_tran_key'] = '7r83Sb4HUd58Tz5p';

// AIM Stuff:
$data['x_version'] = '3.1';
$data['x_delim_data'] = 'TRUE';
$data['x_delim_char'] = '|';
$data['x_relay_response'] = 'FALSE';

// Transaction stuff:
$data['x_method'] = 'CC';

// Order info:
$data['x_amount'] = $order_total;
$data['x_invoice_num'] = $order_id;
$data['x_cust_id'] = $customer_id;

// For testing purposes:
// $data['x_test_request'] = 'TRUE';
// $data['x_amount'] = 6.00;

// Convert the data:
$post_string = '';
foreach( $data as $k => $v ) { 
	$post_string .= "$k=" . urlencode($v) . "&";
}
$post_string = rtrim($post_string, '& ');

// The following section provides an example of how to add line item details to
// the post string.  Because line items may consist of multiple values with the
// same key/name, they cannot be simply added into the above array.
//
// This section is commented out by default.
/*
$line_items = array(
	"item1<|>golf balls<|><|>2<|>18.95<|>Y",
	"item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
	"item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
	
foreach( $line_items as $value )
	{ $post_string .= "&x_line_item=" . urlencode( $value ); }
*/

// This sample code uses the CURL library for php to establish a connection,
// submit the post, and record the response.
// If you receive an error, you may want to ensure that you have the curl
// library enabled in your php configuration
$request = curl_init(GATEWAY_API_URL); // initiate curl object
curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
$response = curl_exec($request); // execute curl post and store results in $post_response
// additional options may be required depending upon your server configuration
// you can find documentation on curl options at http://www.php.net/curl_setopt
curl_close ($request); // close curl object

// This line takes the response and breaks it into an array using the specified delimiting character
$response_array = explode($data["x_delim_char"],$response);