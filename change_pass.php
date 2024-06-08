<?php include('./layouts/header.php');?>
<div class="col-lg-12 mt-5">
                <form action="account.php" id="account-form" method="POST">
                    <p class="text-danger"><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>
                    <p class="text-primary"><?php if(isset($_GET['message'])){ echo $_GET['message'];}?></p>
                    <h3 class="mb-4">Change Password</h3>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" class="form-control" placeholder="Password" name="pass" required>
                    </div>
                    <div class="form-group">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" id="cpass" class="form-control" placeholder="Confirm Password" name="cpass" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info text-white" name="change_pass" value="Change Password">
                    </div>
                </form>
</div>
        
<?php include('./layouts/footer.php');?>