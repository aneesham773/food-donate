<?php
require('./instamojo.php');
const API_KEY="test_e9cddedfdb8ab028a7277b62fac";
const AUTH_TOKEN="test_6486405c239ccc31c1fb9f0087f";

if(isset($_POST['purpose'])&&isset($_POST['grand_total'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])){

$api=new Instamojo\Instamojo(API_KEY,AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $_POST['purpose'],
        "buyer_name" => $_POST['name'],
        "amount" => $_POST['grand_total'],
        "send_email" => true,
        "email" => $_POST['email'],
        "send_sms" =>true,
        "phone" =>$_POST['phone'],

        "allow_repeated_payments" => false,
        "redirect_url" => "http://localhost/front/success.html"
        ));
    header('Location:'.$response['longurl']);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
}
?>