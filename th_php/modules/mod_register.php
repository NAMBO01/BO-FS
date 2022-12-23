<div class="container">

    <div class="register">
        <form method="POST">
            <div class="  register-top-grid">
                <h3>PERSONAL INFORMATION</h3>
                <div class="mation">
                    <span>First Name<label>*</label></span>
                    <input type="text" name='ho' id='ho' class="form-control">

                    <span>Last Name<label>*</label></span>
                    <input type="text" name='ten' id='ten' class="form-control">

                    <span>Email Address<label>*</label></span>
                    <input type="mail" name='email' id='email' class="form-control">

                    <span>Phone Number<label>*</label></span>
                    <input type="text" name='sdt' id='' class="form-control">

                </div>
                <div class="clearfix"> </div>
                <a class="news-letter" href="#">
                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up</label>
                </a>
            </div>
            <div class="  register-bottom-grid">
                <h3>LOGIN INFORMATION</h3>
                <div class="mation">
                    <span>Password<label>*</label></span>
                    <input type="password" name="mat_khau" id="password" class="form-control">
                    <span>Confirm Password<label>*</label></span>
                    <input type="password" name="re_mat_khau" id="re_password" class="form-control">
                </div>
            </div>
            <div class="register-but">

                <input type="submit" value="submit" name='btn_submit' id='btn_submit'>
                <div class="clearfix"> </div>
            </div>
        </form>
        <div class="clearfix"> </div>
        <div class="register-but">

        </div>
    </div>
    <?php include_once("widgets/categories.php"); ?>

</div>