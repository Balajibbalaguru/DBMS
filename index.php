<?php include('./layouts/header.php')?>

<style>
  body {
    background-color: #f8f9fa;
  }
  
  .background-clip {
    filter: brightness(70%);
  }

  .banner-heading {
    font-family: 'Arial', sans-serif;
    font-weight: bold;
  }

  .btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
    transition: background-color 0.3s ease;
  }

  .btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
  }

  .dcard {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .dcard:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .dcard img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .star {
    color: #ffcc00;
  }

  .card-title {
    font-family: 'Arial', sans-serif;
    font-weight: bold;
    margin-top: 10px;
  }

  .card-text {
    color: #28a745;
    font-size: 1.2rem;
  }

  .btn-info.text-white {
    background-color: #28a745;
    border-color: #28a745;
    transition: background-color 0.3s ease;
  }

  .btn-info.text-white:hover {
    background-color: #218838;
    border-color: #1e7e34;
  }
</style>

<section id="home">
  <div class="container">

    <div class="text-center" style="position: relative; z-index: 1;">
      <h2 class="text-light banner-heading">New Launches</h2>
      <h1 class="text-light"><span>Best Deal</span> For This Month</h1>
      <p class="text-light banner-heading">e-MAX offers the best electronic products for the most affordable prices!</p>
      <a href="#featured"><button class="btn btn-info">Start Shopping!</button></a>
    </div>
  </div>
</section>

<section id="brand" class="container mt-5 pt-5">
  <div class="row">
    <h2 class="text-center">Our Brands</h2>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-3 w-100 text-center">
      <img src="./assets/brands.png" alt="" class="brand-image img-fluid">
    </div>
  </div>
</section>

<section id="new" class="container py-5">
  <div class="text-center mb-5">
    <h2>OFFER ZONE</h2>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-12 mb-4">
      <div class="dcard text-center">
        <img src="./assets/laptop.jpg" alt="" class="devices card-img-top text-center">
        <div class="card-body">
          <h5 class="card-title">Sleek and Stylish Laptops</h5>
          <a href="#laptops"><button class="btn btn-info text-white">Buy Now</button></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 mb-4">
      <div class="dcard text-center">
        <img src="./assets/mobile.jpg" alt="" class="devices card-img-top text-center">
        <div class="card-body">
          <h5 class="card-title">Flagship Mobiles</h5>
          <a href="#mobiles"><button class="btn btn-info text-white">Buy Now</button></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 mb-4">
      <div class="dcard text-center">
        <img src="./assets/airpods.jpeg" alt="" class="devices card-img-top text-center">
        <div class="card-body">
          <h5 class="card-title">Sound Without Boundaries Airpods</h5>
          <a href="#airpods"><button class="btn btn-info text-white">Buy Now</button></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 mb-4">
      <div class="dcard text-center">
        <img src="./assets/smartwatches.jpg" alt="" class="devices card-img-top text-center">
        <div class="card-body">
          <h5 class="card-title">Fascinating Smartwatches</h5>
          <a href="#smartwatches"><button class="btn btn-info text-white">Buy Now</button></a>
        </div>
      </div>
    </div>
    <div class="text-center">
      <a href="shop.php"><button class="btn btn-info btn-lg mt-5">Shop Now</button></a>
    </div>
  </div>
</section>

<section id="featured" class="container py-5">
  <div class="text-center mb-5 mt-4">
    <h2>Our Featured</h2>
  </div>
  <div class="row">
    <?php include('./server/get_product.php'); ?>
    <?php while($r = $f_product->fetch_assoc()){ ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="dcard h-100 w-100">
        <img src="./assets/<?php echo $r['product_image'];?>" alt="" class="card-img-top">
        <div class="card-body">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <h5 class="card-title"><?php echo $r['product_name'];?></h5>
          <h4 class="card-text">Rs.<?php echo $r['product_price'];?></h4>
          <a href="<?php echo 'single.php?product_id='.$r['product_id']?>" class="btn btn-info text-white">Buy Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>

<section id="laptops" class="container py-5">
  <div class="text-center mt-4">
    <h2>Laptops</h2>
    <br>
    <p>Elevate your digital lifestyle with the unmatched performance and style of our Laptops</p>
  </div>
  <div class="row">
    <?php include('./server/get_laptop.php');?>
    <?php while($r = $s_product->fetch_assoc()){ ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="dcard">
        <img src="./assets/<?php echo $r['product_image'];?>" alt="" class="card-img-top">
        <div class="card-body">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <h5 class="card-title"><?php echo $r['product_name'];?></h5>
          <h4 class="card-text">Rs.<?php echo $r['product_price'];?></h4>
          <a href="<?php echo 'single.php?product_id='.$r['product_id']?>" class="btn btn-info text-white">Buy Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>

<section id="mobiles" class="container py-5">
  <div class="text-center mt-4">
    <h2>Mobiles</h2>
    <br>
    <p>Empower your productivity with the efficiency and reliability of our Mobiles</p>
  </div>
  <div class="row">
    <?php include('./server/get_phone.php');?>
    <?php while($r = $c_product->fetch_assoc()){ ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="dcard">
        <img src="./assets/<?php echo $r['product_image'];?>" alt="" class="card-img-top">
        <div class="card-body">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <h5 class="card-title"><?php echo $r['product_name'];?></h5>
          <h4 class="card-text">Rs.<?php echo $r['product_price'];?></h4>
          <a href="<?php echo 'single.php?product_id='.$r['product_id']?>" class="btn btn-info text-white">Buy Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>

<section id="airpods" class="container py-5">
  <div class="text-center mt-4">
    <h2>Airpods</h2>
    <br>
    <p>Stay in tune with your world while enjoying unparalleled comfort with our Airpods</p>
  </div>
  <div class="row">
    <?php include('./server/get_airpods.php');?>
    <?php while($r = $w_product->fetch_assoc()){ ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="dcard">
        <img src="./assets/<?php echo $r['product_image'];?>" alt="" class="card-img-top">
        <div class="card-body">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <h5 class="card-title"><?php echo $r['product_name'];?></h5>
          <h4 class="card-text">Rs.<?php echo $r['product_price'];?></h4>
          <a href="<?php echo 'single.php?product_id='.$r['product_id']?>" class="btn btn-info text-white">Buy Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>

<section id="smartwatches" class="container py-5">
  <div class="text-center mt-4">
    <h2>Smart Watches</h2>
    <br>
    <p>Stay in tune with your world while enjoying unparalleled comfort with our Smartwatches</p>
  </div>
  <div class="row">
    <?php include('./server/get_smartwatch.php');?>
    <?php while($r = $w_product->fetch_assoc()){ ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="dcard">
        <img src="./assets/<?php echo $r['product_image'];?>" alt="" class="card-img-top">
        <div class="card-body">
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <h5 class="card-title"><?php echo $r['product_name'];?></h5>
          <h4 class="card-text">Rs.<?php echo $r['product_price'];?></h4>
          <a href="<?php echo 'single.php?product_id='.$r['product_id']?>" class="btn btn-info text-white">Buy Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>

<?php include('./layouts/footer.php');?>
