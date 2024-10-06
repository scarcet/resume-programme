<?php
include('includes/nav.php');

?>
<br><br><br>

<?php
$user = new Users();
if(isset($_POST['submit'])){
    $name  = trim($_POST['name']);
    $email = val_eml($_POST['email']);
    $adrs  = $_POST['adrs'];
    $pass  = hashpass($_POST['password']);

    $user->user_name      = $name;
    $user->user_email     = $email;
    $user->user_adrs      = $adrs;
    $user->password       = $pass;
    $user->role           = 'customer';

    $verify = $user->verifyuser($email, $pass);
    if($verify){
      $msg = "Sorry!!! User already exist. Try and sign in";
      keep_failmsg($msg);
    }
    else{
      
      $signedup = $user->create();
      if($signedup){
        $msg = "Successfully signed up. Please sign in";
        keep_succmsg($msg);
        //header('location: cust_signin.php');
       }
    }

}
?>
<?php if(isset($_SESSION['failmsg']) && $verify) : ?>
<div class="alert alert-danger text-center">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php show_failmsg(); ?>
  </div>
  <?php endif; ?>
  <?php if(isset($_SESSION['succmsg']) && $signedup) : ?>
<div class="alert alert-success text-center">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php show_succmsg(); ?>
  </div>
  <?php endif; ?>
<div class="row">
      <div class="col-lg-2 mb-4">
      </div>
      <div class="col-lg-8 mb-4">
          <div class="card-header">
        <h3>SignUp</h3>
         <form name="sentMessage" method="post" id="contactForm" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="control-group form-group">
            <div class="controls">
              <label>First Name:</label>
              <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Address:</label>
              <input type="text" class="form-control" id="adrs" name="adrs"  data-validation-required-message="Please enter your address.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email.">
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
          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="submit">SignUp</button></a>
        </form><br>
        <p>You already have an account? <strong><a href="cust_signin.php">SignIn</a></strong> to edit your profile.</p>
      </div>
    </div>
  </div>

    <?php
  include('../includes/footer.php');
  ?>