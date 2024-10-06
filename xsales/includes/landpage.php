<?php
if(!isset($_SESSION['load_once'])){
$cookie = new Cookies();
$cookie->check_cookie();
$message = $cookie->check_visitstatus();
//$cookie->user_check ? keep_succmsg($message) : keep_succmsg($message);
keep_succmsg($message);

$_SESSION['load_once'] = true;
}
?>
<br><br>
<div style="background-color: #e6f9ff; height: auto">
<div class="container"><br><br>
<?php if(isset($_SESSION['failmsg'])) : ?>
          <div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php show_failmsg(); ?></strong>
            </div>
<?php endif; ?>
<?php if(isset($_SESSION['succmsg'])) : ?>
          <div class="alert alert-success text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php show_succmsg(); ?></strong>
            </div>
<?php endif; ?>
<div class="row"> 
      <div class="col-lg-6 mb-4"><br>
        <h1>XSales Market</h1>
        <div class="row"> 
      <div class="col-lg-8 mb-4">
        <p>Where to get affordable goods, reliable payments and excellent deliveries. We stand out among others</p>
      </div>
        </div>
        <button class="btn-primary btn-lg" style="background-color: #006280!important;">Latest Goods</button>
        </div>
        <div class="col-lg-6 mb-4">
        <img src="images/image5.jpeg" alt="image" width="90%" height="300px">
        </div>
      </div>
</div>
</div>