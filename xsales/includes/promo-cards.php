<?php
$promo = Product::promo_pro();
?>
<div style="padding: 80px!important;">
      <table class="table">
    <tbody>
      <tr>
        <td rowspan="2"><img src="images/image8.jpeg" alt="image" width="90%" height="auto"></td>
        <td>
        <div class="card">
        <div style="background-color: #e6f9ff!important;">
      <div class="cards" style="height: auto; padding-left: 20px;">
      <img src="images/image2.jpeg" alt="image" width="90%" height="180px">
      </div>
      <h4><?php echo $promo->pro_name; ?></h4>
      <div class="row">
      <div class="col-lg-6 col-sm-6">
        <p>#<?php echo $promo->pro_price; ?></p>
      </div>
      <div class="col-lg-6 col-sm-6">
      <a href="item.php?id= <?php echo $promon->id;?>"><button class="btn btn-xs" style="background-color: #006280!important; color: white;">check</button></a>
      </div>
      </div>
      </div>
        </div>      
        </td>
      </tr>
      <tr>
      <td>
        <div class="card">
        <div style="background-color: #e6f9ff!important;">
      <div class="cards" style="height: auto; padding-left: 20px;">
      <img src="images/image3.jpeg" alt="image" width="90%" height="180px">
      </div>
      <h4><?php echo $promo->pro_name; ?></h4>
      <div class="row">
      <div class="col-lg-6 col-sm-6">
        <p>#<?php echo $promo->pro_price; ?></p>
      </div>
      <div class="col-lg-6 col-sm-6">
      <a href="item.php?id= <?php echo $promo->id;?>"><button class="btn btn-xs" style="background-color: #006280!important; color: white;">check</button></a>
      </div>
      </div>
      </div>
        </div>      
        </td>
      </tr>
    </tbody>
  </table>
</div>
