<div class="container">

    <div class="register">
        <form>
            <div class="  register-top-grid">
                <h3>PERSONAL INFORMATION</h3>
                <div class="mation">
                    <span>First Name<label>*</label></span>
                    <input type="text" name='ho' id='ho'>

                    <span>Last Name<label>*</label></span>
                    <input type="text" name='ten' id='ten'>

                    <span>Email Address<label>*</label></span>
                    <input type="text" name='email' id='email'>
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
                    <input type="text" name="password" id="password">
                    <span>Confirm Password<label>*</label></span>
                    <input type="text" name="confirm_password" id="confirm_password">
                </div>
            </div>
        </form>
        <div class="clearfix"> </div>
        <div class="register-but">
            <form>
                <input type="submit" value="submit" name='btn_submit' id='btn_submit'>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
    <?php include_once("widgets/categories.php"); ?>

</div>