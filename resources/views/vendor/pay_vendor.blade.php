<?php

session_start();
require('include/config.php');
require('razorpay-php/razorpay-php/Razorpay.php');

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//

$IdAmount = $_POST['subsciptionIdAmount'];
$result=explode(',', $IdAmount);
$subid=$result[0];
$price=$result[1];
$description=$result[2];
$_SESSION['subid'] = $subid;
$_SESSION['price'] = $price;
$_SESSION['description'] = $description;
$vendor_name = $_POST['vendor_name'];
$_SESSION['vendor_name'] = $vendor_name;
$email = $_POST['email'];
$_SESSION['email'] = $email;
$vendor_mobile = $_POST['vendor_mobile'];
$_SESSION['vendor_mobile'] = $vendor_mobile;

$query_one = "SELECT * FROM vendors where vendor_mobile='".$vendor_mobile."'";
    $result_one = mysqli_query($conn, $query_one);
    if(mysqli_num_rows($result_one)>0){

        echo '<script>alert("Mobile No Already Registered");</script>';
          echo '<script>window.location.href = "add_vendor.php";</script>';

    }

    $query_two = "SELECT * FROM vendors where email='".$email."'";
    $result_two = mysqli_query($conn, $query_two);
    if(mysqli_num_rows($result_two)>0){

        echo '<script>alert("Email ID Already Registered");</script>';
          echo '<script>window.location.href = "add_vendor.php";</script>';
        
    }

$password = md5($_POST['password']);
$_SESSION['password'] = $password;
$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Star Panel Developers",
    "description"       => $description,
    "image"             => "https://scontent-bom1-1.xx.fbcdn.net/v/t39.30808-6/245197138_425298535857809_7750570289900934940_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=-3gwHiClpPYAX9fJVu7&_nc_oc=AQm7ArlHEFSea-exhaRHfgY_hdJntb4THM3J5JNspwXUF0L3CZm4YTUNRJkrX9kl3SE&_nc_ht=scontent-bom1-1.xx&oh=00_AT8chFFH1IrGeMtzK-TCC-C46FU7MD5d9tuQ2ys9C4lt2w&oe=630C1838",
    "prefill"           => [
    "name"              => $vendor_name,
    "email"             => $email,
    "contact"           => $vendor_mobile,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
require('checkout/manual_vendor.php');
?>
<!--<script type="text/javascript">
    $(document).ready(function(){
        $('.rzp-button1').click();
    });

</script>-->

<script>
document.getElementById('rzp-button1').click();
</script>
