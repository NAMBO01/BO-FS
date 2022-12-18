<div class="container">

    <div class="account_grid">
        <div class=" login-right">
            <h3>REGISTERED CUSTOMERS</h3>
            <p>If you have an account with us, please log in.</p>
            <form method="POST" action="">
                <div>
                    <span>Email Address<label>*</label></span>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div>
                    <span>Password<label>*</label></span>
                    <input type="password" name="mat_khau" id="password" class="form-control">
                </div>
                <a class="forgot" href="#">Forgot Your Password?</a>
                <input type="submit" value="Login" name="login" id="login">
            </form>
        </div>
        <div class=" login-left">
            <h3>NEW CUSTOMERS</h3>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <a class="acount-btn" href="register.php">Create an Account</a>
        </div>
        <div class="clearfix"> </div>
    </div>
    <?php include_once("widgets/categories.php"); ?>
    <div class="clearfix"> </div>
</div>