<?php include("includes/cust_header.php"); ?>

<center><h3>CART LIST</h3></center>
<?php
$cart = new Cart();
if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):
$results = $cart->findall_cart();

?>
<div class="container" style="background-color: #e6f9ff!important;">
<div class="row"> 
      <div class="col-lg-7 mb-4">
      <table class="table table-striped">
    <thead>
      <tr>
        <th><h6 class="">Items Selected</h6><hr></th>
      </tr>
    </thead>
    <?php foreach($results as $result): ?>
    <tbody>
      <tr>
      <td><img src="upload_img/<?php echo $result->pro_img; ?>" alt="image" width="100%" height="100px">
      <h6><?php echo $result->pro_name; ?></h6>
    </td>
        <td>
            <h6>Price: #<?php echo $result->pro_price; ?></h6>
            <h6>Qty: <?php echo $result->pro_qty; ?></h6>
            <h6>Total: #<?php echo $result->pro_price * $result->pro_qty; ?></h6>
        </td>
        <td>
        <form name="sentMessage" method="post" id="contactForm" enctype="multipart/form-data" action="cart_list.php">
        <input type="hidden" name="product_id" value="<?php echo $result->id;?>">
        <button class="btn btn-danger" type="submit" name="remove">remove</button>
        </form></td>
      </tr>
    </tbody>
    <?php endforeach; ?>
  </table>
      </div>
      <div class="col-lg-5 mb-4">
      <table class="table table-striped">
    <thead>
      <tr>
        <th><h4 class="">Cart/List Summary</h4><hr></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h6>No Of Selected Product:</h6></td>
        <td><?php echo $cart->tocount_cart(); ?></td>
      </tr>
      <tr>
        <td><h6>Total Qty:</h6></td>
        <td><?php echo $cart->total_pro(); ?></td>
      </tr>
      <tr>
        <td><h6>Amount Of Goods:</h6></td>
        <td>#<?php echo $cart->totalamt(); ?></td>
      </tr>
      <tr>
        <td><h6>Delivery Charge:</h6></td>
        <td>#390</td>
      </tr>
      <tr>
        <td><h6>Estimated Price:</h6></td>
        <td>#<?php echo $cart->totalamt() + 390; ?></td>
      </tr>
    </tbody>
  </table>
  <a href="../index.php"><button class="btn btn-success">Add More Products</button></a>
  <a href="../check_out_form.php"><button class="btn btn-success"  data-toggle="modal" data-target="#myModal">Check Out</button></a>
      </div>
      </div>
      </div>
      <?php
      if(isset($_POST['remove'])){
        $id =  $_POST['product_id'];
        $cart->remove($id);
        $page = "cart_list.php";
        redirect($page);
      }
      ?>
      <?php
              endif; 
      ?>
