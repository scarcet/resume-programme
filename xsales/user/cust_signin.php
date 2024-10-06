<?php
include('includes/nav.php');

?>
<br><br><br>
<?php
if($session->checksignin()){
  header('location: cust_page.php');
    
}

 
if(isset($_POST['submit'])){
  $eml     = $_POST['email'];
  $psw     = $_POST['password'];
  $pass    = hashpass($psw);
  $userrec = Users::verifyuser($eml, $pass);
  
  if($userrec){
    $_SESSION['id'] = $userrec->id;
    $session->login($userrec);
    header('location: cust_page.php');
  }
  else{
    $msg = "Sorry! User does not exist. Check if your email and password is correct.";
    keep_failmsg($msg);
  }
  
}

?>
  <?php if(isset($_SESSION['failmsg'])) : ?>
<div class="alert alert-danger text-center">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php show_failmsg(); ?>
  </div>
  <?php endif; ?>
<div class="row">
      <div class="col-lg-2 mb-4">
      </div>
      <div class="col-lg-8 mb-4">
          <div class="card-header">
        <h3>SignIn</h3>
         <form name="sentMessage" method="post" id="contactForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" id="email" name="email"  data-validation-required-message="Please enter your email.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Password:</label>
              <input type="Password" class="form-control" id="pwd" name="password" required data-validation-required-message="Please enter your Password.">
              <label>Show Password:</label>
              <input type="checkbox" id="showpass" name="showpass" onclick="showMypass()">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="submit">SignIn</button>
        </form><br>
        <p>You dont have an account? <strong><a href="cust_signup.php">SignUp</a></strong> to create your profile.</p>
      </div>
    </div>
  </div>

  <?php
  include('../includes/footer.php');
  ?>