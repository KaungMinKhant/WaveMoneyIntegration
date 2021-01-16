<?php


require('../vendor/autoload.php');

$secret_key = "b9e1d8ed5db8e174bd4eef5d0aacae132719fa0c553d92085d47ff5036ab414f";

$data = [
    // Time to Live for Transaction in seconds
    'time_to_live_in_seconds' => 20,

    // string - Merchant Name for Payment Screen
    'merchant_name' => "MYEO",

    // string - Merchant id provided by Wave Money
    'merchant_id' => "MYEOwmmerchant",

    // unsigned integer - Order id provided Merchant
    'order_id' => $_GET['messenger-user-id'],

    // unsigned integer - Total Amount of transaction
    'amount' => 50,

    // string - mendatory backend url for Payment Service
    'backend_result_url' => "http://localhost/wave.php",

    // string - mendatory frontend url for Payment Service
    'frontend_result_url' => "https://m.me/myeo.hub",

    // string - Unique Merchant Reference ID for Transaction
    'merchant_reference_id' => "myeo-" . rand(1000000, 9999999),

    // string - Payment Description for Payment Screen from Merchant
    'payment_description' => "Buying things from Wave Merchant"
];
// URL to call to activate user -> https://hook.integromat.com/vivlijuhxjybcful34j3huisdbvj5on2?uid=$_GET['messenger-user-id']

// Secret Key provided by Wave Money


$items = json_encode([
    ['name' => "Test Product 1", 'amount' => 50],
]);

$hash = hash_hmac('sha256', implode("", [
    $data['time_to_live_in_seconds'],
    $data['merchant_id'],
    $data['order_id'],
    $data['amount'],
    $data['backend_result_url'],
    $data['merchant_reference_id'],
]), $secret_key);

$impode = implode("", [$data['time_to_live_in_seconds']])

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wave Merchant Integration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="lann-sa.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">MYEO ရဲ့ လမ်းစ Program</h5>
                    <p class="card-text">Digital Skill, Soft Skills အစရှိတယ့် ၂၁ ရာစုမှာ သိသင့် သိထိုက်သည်များကို ၂ လ စာ သင်ကြားပေးသွားမည့် အစီအစဥ်</p>
                    <form action="https://testpayments.wavemoney.io:8107/payment" method="POST">
                        <input type="hidden" name="time_to_live_in_seconds" value="<?php echo $data['time_to_live_in_seconds']; ?>">
                        <input type="hidden" name="merchant_id" value="<?php echo $data['merchant_id']; ?>">
                        <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
                        <input type="hidden" name="merchant_reference_id" value="<?php echo $data['merchant_reference_id']; ?>">
                        <input type="hidden" name="frontend_result_url" value="<?php echo $data['frontend_result_url']; ?>">
                        <input type="hidden" name="backend_result_url" value="<?php echo $data['backend_result_url']; ?>">
                        <input type="hidden" name="amount" value="<?php echo $data['amount']; ?>">
                        <input type="hidden" name="payment_description" value="<?php echo $data['payment_description']; ?>">
                        <input type="hidden" name="merchant_name" value="<?php echo $data['merchant_name']; ?>">
                        <input type="hidden" name="items" value='<?php echo $items; ?>'>
                        <input type="hidden" name="hash" value="<?php echo $hash; ?>">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" style="text-align:center;">Make Payment</button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
