<?php 
include('./server/connection.php');
if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

$st = $conn->prepare("SELECT count(*) as total_records from products");
$st->execute();
$st->bind_result($total_records);
$st->store_result();
$st->fetch();

$total_records_per_page = 4;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adj = 2;
$total_no_of_pages = ceil($total_records / $total_records_per_page);

$st2 = $conn->prepare("SELECT * FROM products LIMIT ?, ?");
$st2->bind_param("ii", $offset, $total_records_per_page);
$st2->execute();
$products = $st2->get_result();
?>
<?php include('./layouts/header.php');?>
<section id="shop" class="mb-3 my-5 py-5">
  <div class="container">
    <h3 class="text-center">Our Products</h3>
    <br>
    <p class="text-center">Here you can check out our Products</p>
  </div>
  <div class="row mx-auto container">
    <?php while($r = $products->fetch_assoc()){?>
    <div class="product col-12 mb-4 d-flex align-items-center">
      <div class="col-lg-4 col-md-5 col-sm-6 col-12">
        <img src="./assets/<?php echo $r['product_image']; ?>" alt="" class="img-fluid mb-3">
      </div>
      <div class="col-lg-8 col-md-7 col-sm-6 col-12 text-left">
        <h1 class="p-name"><?php echo $r['product_name']; ?></h1>
        <h4 class="p-price">Rs.<?php echo $r['product_price']; ?></h4>
        <div class="star text-primary mb-2">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p class="p-description">
          <?php echo $r['product_description']; // Assuming there's a description field ?>
        </p>
        <button class="buy-now btn btn-info">
          <a href="single.php?product_id=<?php echo $r['product_id']; ?>" class="text-white">Buy Now</a>
        </button>
      </div>
    </div>
    <?php }?>
    <nav aria-label="page navigation example" class="col-12">
      <ul class="pagination justify-content-center mt-5">
        <li class="page-item <?php if($page_no <= 1) echo 'disabled'; ?>">
          <a href="<?php if($page_no <= 1) echo '#'; else echo '?page_no='.($previous_page); ?>" class="page-link">Previous</a>
        </li>
        <?php for($i = max(1, $page_no - $adj); $i <= min($page_no + $adj, $total_no_of_pages); $i++) { ?>
          <li class="page-item <?php if($page_no == $i) echo 'active'; ?>">
            <a href="?page_no=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
          </li>
        <?php } ?>
        <li class="page-item <?php if($page_no >= $total_no_of_pages) echo 'disabled'; ?>">
          <a href="<?php if($page_no >= $total_no_of_pages) echo '#'; else echo '?page_no='.($next_page); ?>" class="page-link">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</section>
<?php include('./layouts/footer.php');?>


