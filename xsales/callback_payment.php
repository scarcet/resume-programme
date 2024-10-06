<?php
include('includes/nav.php');
?><br><br><br>
<?php
$pay = new Payment();
$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';

if(!$reference){
    die('No reference supplied');
}

$pay->curl_setoptcallbck($curl, $reference);
$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    die('Curl returned error' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
    die('API returned error' . $tranx->message);
}
if('success' == $tranx->data->status){
    echo '          <div class="alert alert-success text-center">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thank you for successfully making the payment ... your products will be delivered to you as soon as possible</strong>
  </div>'; 
}
?>