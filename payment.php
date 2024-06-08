<?php
session_start();
if(isset($_POST['order_pay'])){
    $os=$_POST['order_status'];
    $otp=$_POST['total_order'];
}
?>
<?php include('./layouts/header.php'); ?>
<section class="my-1 py-1 mb-5 pb-5 mt-3">
    <div class="container text-center mt-3 pt-5">
        <h1>Payment</h1>
        <br>
    </div>
    <div class="mx-auto container text-center">
        <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
            <p>Total Payment: Rs.<?php echo $_SESSION['total']; ?></p>
            <form id="payment_form" action="payment_success.php" method="POST">
                <input type="hidden" name="total_payment" value="<?php echo $_SESSION['total']; ?>">
                <!-- Add delivery options here -->
                <p>Select payment mode:</p>
                <input type="radio" id="upi" name="delivery_option" value="upi">
                <label for="upi">UPI</label><br>
                <input type="radio" id="card" name="delivery_option" value="card">
                <label for="card">Credit/Debit/ATM Card</label><br>
                <input type="radio" id="cod" name="delivery_option" value="cod">
                <label for="cod">Cash on Delivery</label><br><br>
                <input type="submit" id="pay_now_btn" value="Pay Now" class="btn btn-danger">
            </form>
        <?php } else if(isset($_POST['total']) && $_POST['order_status'] == 'Not Paid') { ?>
            <p>Total Payment: Rs.<?php echo $_POST['total_order_price']; ?></p>
            <form id="payment_form" action="payment_success.php" method="POST">
                <input type="hidden" name="total_payment" value="<?php echo $_POST['total_order_price']; ?>">
                <!-- Add delivery options here -->
                <p>Select Delivery Option:</p>
                <input type="radio" id="upi" name="delivery_option" value="upi">
                <label for="upi">UPI</label><br>
                <input type="radio" id="card" name="delivery_option" value="card">
                <label for="card">Credit/Debit/ATM Card</label><br>
                <input type="radio" id="cod" name="delivery_option" value="cod">
                <label for="cod">Cash on Delivery</label><br><br>
                <input type="submit" id="pay_now_btn" value="Pay Now" class="btn btn-danger">
            </form>
        <?php } else { ?>
            <p>You don't have any orders</p>
        <?php } ?>
    </div>

<script>
    document.getElementById('payment_form').addEventListener('change', function() {
        var paymentOption = document.querySelector('input[name="delivery_option"]:checked').value;
        var payNowBtn = document.getElementById('pay_now_btn');

        if (paymentOption === 'cod') {
            payNowBtn.value = 'Order Now';
            payNowBtn.addEventListener('click', function() {
                document.getElementById('payment_form').action = 'order_placed.php';
                document.getElementById('payment_form').submit();
            });
        } else {
            payNowBtn.value = 'Pay Now';
            payNowBtn.removeEventListener('click', function() {
                document.getElementById('payment_form').action = 'order_placed.php';
                document.getElementById('payment_form').submit();
            });
        }
    });
</script>



</section>


 <?php include('./layouts/footer.php'); ?>