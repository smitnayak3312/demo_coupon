<html>
<head>
<title>Payment</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>   
<body style="background:#000000;">

<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature">
     <input type="hidden" name="ddd" value="2356">
    
<div class="container" style="margin-top:30px">
    <div class="col-md-4">
        </div>
<div class="col-md-4">
    <img src="https://scontent-bom1-1.xx.fbcdn.net/v/t39.30808-6/245197138_425298535857809_7750570289900934940_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=-3gwHiClpPYAX9fJVu7&_nc_oc=AQm7ArlHEFSea-exhaRHfgY_hdJntb4THM3J5JNspwXUF0L3CZm4YTUNRJkrX9kl3SE&_nc_ht=scontent-bom1-1.xx&oh=00_AT8chFFH1IrGeMtzK-TCC-C46FU7MD5d9tuQ2ys9C4lt2w&oe=630C1838" style="width:350px;margin-bottom:50px;">
    <div class="panel panel-default">
  <div class="panel-heading"><h1 class="panel-title" style="text-align:center;"><strong>Pay <?=$data['amount']/100;?> INR</strong></h1></div>
  <div class="panel-body" style="text-align:center;">
  <h5> Thanks For Using My Coupon Application...</h5>
  <button id="rzp-button1" class="btn btn-primary" style="background:#8BC24A;border-color:#8BC24A;color:#fff;margin-top:30px;">Click for Pay</button>
</form>
  </div>
</div>
</div>
</div>


<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
</body>
</html>