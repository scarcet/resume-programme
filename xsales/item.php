<?php
include('includes/nav.php');
?>
<br><br><br><br>
<?php 
$pro_id = $_GET['id'];
$pro = Product::findid($pro_id);
?>
<div class="container">
<div class="row"> 
<div class="col-8 md-3">
      <img src="user/upload_img/<?php echo $pro->pro_img; ?>" alt="image" width="90%" height="250px">
      <h4><?php echo $pro->pro_name; ?></h4>
      <div class="row">
      <div class="col-lg-6 col-sm-6">
        <p>#<?php echo $pro->pro_price; ?></p>
      </div>
      </div>
      </div>
        <div class="col-4 mb-4">
        <div class="row">
        <div class="col md-3">
        <img src="images/together.jpg" alt="image" width="90%" height="auto">
        </div>
        <div class="col md-3">
        <img src="images/together.jpg" alt="image" width="90%" height="auto">
        </div>
        <div class="col md-3">
        <img src="images/together.jpg" alt="image" width="90%" height="auto">
        </div>
        <div class="col md-3">
        <img src="images/together.jpg" alt="image" width="90%" height="auto">
        </div>
        </div>
        <p class="desc">It is a very soft furnished last longing pig leather</p>
        <button type="button" name="" class="btn btn-sm" data-toggle="modal" data-target="#myModal" style="background-color: #006280!important; color: white;">Add To Cart</button>
        </div>
        <?php

      if(isset($_POST['add_cart'])){
        $pro_qty = val_int($_POST['prod_qty']);

           $item = array(
            'id'           => $pro->id,
            'pro_name'     => $pro->pro_name,
            'pro_price'    => $pro->pro_price,
            'pro_qty'      => $pro_qty,
            'pro_category' => $pro->pro_category,
            'pro_datepost' => $pro->pro_datepost,
            'pro_img'      => $pro->pro_img,
          );
          
        $cart->add_cart($item);
        redirect('index.php');
      }

        ?>
</div>
</div>

<!-- Add Cart modal -->
<div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div style="padding: 50px;">
          <center><h3 class="modal-title"><?php echo $pro->pro_name; ?></h3></center>
          <img src="user/upload_img/<?php echo $pro->pro_img; ?>" alt="image" width="90%" height="200px">
          </div>
          
          <div class="modal-body">
         <div class="card h-100">
         <div style="padding: 5px;">
        <form name="sentMessage" method="post" id="contactForm" enctype="multipart/form-data" action="item.php?id=<?php echo $pro_id;?>">
        <div class="form-group">
           <label for="sel1">Quantity:</label>
           <input type="number" class="form-control" id="name" name="prod_qty" required  data-validation-required-message="Please enter quantity" min="1" max="100" >
        </div>
        <input type="hidden" name="product_id">
        <!-- <input type="hidden" name="product_qty"> -->
        <button type="submit" name="add_cart" class="btn btn-sm" style="background-color: #006280!important; color:white;">Add To Cart</button>
        </form>
         </div>
        </div> 
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

<h4 class="text-center">More Products</h4><hr>
<?php
include('includes/main-cards.php');
include('includes/footer.php');
?>
