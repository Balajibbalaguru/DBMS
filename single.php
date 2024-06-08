<?php
include('./server/connection.php');
if(isset($_GET['product_id'])){
  $pid=$_GET['product_id'];
  $st=$conn->prepare('SELECT * from products where product_id= ?');
  $st->bind_param('i',$pid);
  $st->execute();
  $s_product=$st->get_result();
}
else{
  header('location: index.php'); //if product id is not given
}
?>
<?php include('./layouts/header.php');?>       
<section class="single-product my-5 pt-5">
    <div class="container">
        <div class="row">
            <?php while($r = $s_product->fetch_assoc()) { ?>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <img src="./assets/<?php echo $r['product_image']; ?>" alt="" class="img-fluid mt-4 ms-5">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="py-4"><?php echo $r['product_name']; ?></div>
                    <h2>Rs.<?php echo $r['product_price']; ?></h2>
                    <form action="cart.php" method="POST">
                        <input type="number" name="product_quantity" value="1" class="form-control mb-3">
                        <input type="hidden" name="product_id" value="<?php echo $r['product_id'];?>">
                        <input type="hidden" name="product_image" value="<?php echo $r['product_image']; ?>"/>
                        <input type="hidden" name="product_name" value="<?php echo $r['product_name']; ?>"/>
                        <input type="hidden" name="product_price" value="<?php echo $r['product_price']; ?>"/>
                        <button class="btn btn-info" type="submit" name="cart">Add To Cart</button>
                    </form>
                    <h4 class="mt-5 mb-3">Product details</h4>
                    <p><?php echo $r['product_description']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
            <!-- Repeat similar structure for other related products -->
        </div>
    </div>
</section>
<script src="./js/script.js"></script>
<?php include('./layouts/footer.php');?>
