<div class="container"><br><br>
<?php 

$item_total = Product::count_all();
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$item_per_page = 4;
$paginate = new Paginate($page, $item_per_page, $item_total);
$sql = "SELECT * FROM products ";
$sql .= "LIMIT {$item_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$products = Product::findthisquery($sql);
?>

<div class="row"> 
<?php foreach($products as $product): ?>
      <div class="col-lg-3 mb-4">
      <div style="background-color: #e6f9ff!important;">
      <div class="cards" style="height: 200px; padding-left: 20px;">
      <img src="user/upload_img/<?php echo $product->pro_img; ?>" alt="image" width="90%" height="200px">
      </div>
      <h4><?php echo $product->pro_name; ?></h4>
      <div class="row">
      <div class="col-lg-6 col-sm-6">
        <p>#<?php echo $product->pro_price; ?></p>
      </div>
      <div class="col-lg-6 col-sm-6">
      <a href="item.php?id= <?php echo $product->id;?>"><button class="btn btn-xs" style="background-color: #006280!important; color: white;">check</button></a>
      </div>
      </div>
      </div>
      </div>
<?php endforeach; ?>
</div>
<div class="row">
<div class="container">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-8">
<ul class="pager">

    <?php 


    if($paginate->page_total() > 1) {
        if($paginate->has_next()) {
echo "<li class='next' id='next'><a href='index.php?page={$paginate->next()}#bot_nav'>Next</a></li>";
        }
//         for ($i=1; $i <= $paginate->page_total(); $i++) { 
//             if($i == $paginate->current_page) {
// echo  "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
//             } else {
// echo  "<li><a href='index.php?page={$i}'>{$i}</a></li>";
//             }
//         }
          if($paginate->has_previous()) {
echo "<li class='previous'><a href='index.php?page={$paginate->previous()}#bot_nav'>Previous</a></li>";
        }
    }
     ?>
</ul>
  </div>
<div class="col-lg-2">
  </div>
</div>
</div>

