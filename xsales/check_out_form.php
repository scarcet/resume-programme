<?php
include('includes/nav.php');
?><br><br><br>
<?php
$order = new Order();

?>
  <?php
if(isset($_POST['submit'])){
  $order->name       = $_POST['name'];
  $order->email      = val_eml($_POST['email']);
  $order->address    = $_POST['adr'];
  $order->order_date = date('Y/m/d');

  $order->take_order();
    $msg = 'Hurray Order Successfully Created';
    keep_succmsg($msg);
  }
  ?>
<?php if(isset($_SESSION['succmsg'])) : ?>
           <div class="alert alert-success text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php show_succmsg(); ?></strong>
            </div>
<?php endif; ?>
<?php
if($session->checksignin()){
  $id = $_SESSION['id'];
  $user_rec = Users::findid($id);
}
?>

<?php
$pay = new Payment();
$cart = new Cart();
if(isset($_POST['paySubmit'])){
  $pay->name = $_POST['stackName'];
  $pay->email = $_POST['stackEmail'];
  $pay->amount = $cart->totalamt();
  $pay->id = $id;

  $curl = curl_init();
  $pay->curl_setopt($curl);
  $response = curl_exec($curl);
  $err = curl_error($curl);

  if($err){
    die('curl returned error: ' . $err);
  }

  $tranx = json_decode($response, true);
  if(!$tranx['status']){
    echo 'API returned error' . $tranx['message'];
  }
  header('Location: ' . $tranx['data']['authorization_url']);
}
?>
<div class="row">
      <div class="col-lg-2 mb-4">
      </div>
      <div class="col-lg-8 mb-4">
          <div class="card-header">
          <div class="row">
          <div class="col-2">
          </div>
      <div class="col-8">
        <button class="btn btn-sm btn-primary" id="pay-del-btn" onclick="display_pay_del();">Pay On Delivery</button>
        <button class="btn btn-sm btn-primary" id="pay-now-btn" onclick="display_pay_now();">Pay Now With PayStack</button>
      </div>
      <div class="col-2">
      </div>
          </div>
          <div class="pay-del" id="pay-del"><br>
         <form name="sentMessage" method="post" id="contactForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" id="name" name="name" required  data-validation-required-message="Please enter your full name." value="<?php echo $session->checksignin() ? $user_rec->user_name : '';?>">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" id="email" name="email" required  data-validation-required-message="Please enter your email." value="<?php echo $session->checksignin() ? $user_rec->user_email : '';?>">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Contact Address:</label>
              <input type="text" class="form-control" id="adr" name="adr" required data-validation-required-message="Please enter your contact address." value="<?php echo $session->checksignin() ? $user_rec->user_adrs : '';?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="submit">Submit</button>
        </form>
          </div><br>
        <div style="display:none;" class="pay-now" id="pay-now">
        <form name="payNow" method="post" id="contactForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" id="name" name="stackName" required  data-validation-required-message="Please enter your full name." value="<?php echo $session->checksignin() ? $user_rec->user_name : '';?>">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" id="email" name="stackEmail" required  data-validation-required-message="Please enter your email." value="<?php echo $session->checksignin() ? $user_rec->user_email : '';?>">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Contact Address:</label>
              <input type="text" class="form-control" id="adr" name="adr" required data-validation-required-message="Please enter your contact address." value="<?php echo $session->checksignin() ? $user_rec->user_adrs : '';?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="paySubmit">PayNow</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script>
        var pay_del = document.getElementById('pay-del');
        var pay_now = document.getElementById('pay-now');
        var pay_now_btn = document.getElementById('pay-now-btn');
        var pay_del_btn = document.getElementById('pay-del-btn');
     var display_pay_now =  function (){
        pay_now_btn.style.borderBottom = '6px solid green';
        pay_del.style.display = 'none';
        pay_now.style.display = 'block';
        pay_del_btn.style.borderBottom = 'none';
    }
    function display_pay_del(){
      pay_del_btn.style.borderBottom = '6px solid green';
        pay_del.style.display = 'block';
        pay_now.style.display = 'none';
        pay_now_btn.style.borderBottom = 'none';
    }
  </script>