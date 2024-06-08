<?php
session_start();
include('./server/connection.php');
if(isset($_SESSION['logged_in'])==false){
  header('location: login.php');
}
if(isset($_GET['loggout'])){
         if(isset($_SESSION['logged_in'])){
          unset($_SESSION['logged_in']);
          unset($_SESSION['user_email']);
          unset($_SESSION['logged_name']);
          header("location: login.php");
          exit();
         }
}

if(isset($_POST['change_pass'])){
  $pass=$_POST['pass'];
  $cpass=$_POST['cpass'];
  if ($pass != $cpass) {
    header("Location: account.php?error=Passwords do not match");
    exit();
}

// Check if password length is at least 6 characters
 else if(strlen($pass) < 6) {
    header("Location: account.php?error=Password should contain at least 6 characters");
    exit();
}
else{
  $st=$conn->prepare("UPDATE users Set user_password=? where user_email=?");
  $ue=$_SESSION['user_email'];
  $st->bind_param('ss',password_hash($pass, PASSWORD_DEFAULT),$ue);
  if($st->execute()){
    header('location: account.php?message=password updated successfully');
  }
  else{
    header("location: account.php?error=password can't be channged");
  }
}
}
if(isset($_SESSION['logged_in'])){
  $uid=$_SESSION['user_id'];
  $st= $conn->prepare("SELECT * from orders where users_id=?");
  $st->bind_param('s',$uid);
$st->execute();
$orders= $st->get_result();
}
?>
 <?php include('./layouts/header.php');?>    
<section class="my-5 py-5">
    <div class="container-fluid">
        <div class="column">
            <div class="col-lg-12">
                <div class="text-center mt-3 p-1">
                    <p class="text-danger"><?php if(isset($_GET['register_success'])) {echo $_GET['register_success'];}?></p>
                    <p class="text-success"><?php if(isset($_GET['login_success'])) {echo $_GET['login_success'];}?></p>
                    <h3 class="font-weight-bold">Account Info</h3>
                    <br>
                    <div class="account-info">
                        <p><strong>Name:</strong> <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];}?></p>
                        <p><strong>Email:</strong> <?php if(isset($_SESSION['user_name'])){  echo $_SESSION['user_email'];}?></p>
                        <p><a href="account.php?loggout=1" id="logout-btn" class="btn btn-danger text-white">Logout</a></p>
                        <a href="change_pass.php" class="btn btn-warning text-white">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="orders my-5">
    <div class="container">
        <div class="text-center mt-2">
            <h2 class="font-weight-bold">Your Orders</h2>
            <br>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Cost</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Order Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($r=$orders->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $r['order_id'];?></td>
                            <td>Rs. <?php echo $r['order_cost'];?></td>
                            <td><?php echo $r['order_status'];?></td>
                            <td><?php echo date("F j, Y, g:i a", strtotime($r['order_date']));?></td>
                            <td>
                                <form action="order_details.php" method="POST">
                                    <input type="hidden" value="<?php echo $r['order_status']; ?>" name="order_status">
                                    <input type="hidden" value="<?php echo $r['order_id'];?>" name="order_id">
                                    <button type="submit" class="btn btn-info text-white" name="order_details">Details</button>
                                </form>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include('./layouts/footer.php');?>
