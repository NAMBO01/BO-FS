<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="top-header-left">
                <ul class="support">
                    <li><a href="#"><label> </label></a></li>
                    <li><a href="#">24x7 live<span class="live"> support</span></a></li>
                </ul>
                <ul class="support">
                    <li class="van"><a href="#"><label> </label></a></li>
                    <li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="top-header-right">
                <div class="down-top">
                    <select class="in-drop">
                        <option value="English" class="in-of">English</option>
                        <option value="Japanese" class="in-of">Japanese</option>
                        <option value="French" class="in-of">French</option>
                        <option value="German" class="in-of">German</option>
                    </select>
                </div>
                <div class="down-top top-down">
                    <select class="in-drop">

                        <option value="Dollar" class="in-of">Dollar</option>
                        <option value="Yen" class="in-of">Yen</option>
                        <option value="Euro" class="in-of">Euro</option>
                    </select>
                </div>
                <!---->
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="header-bottom-left">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt=" " /></a>
                </div>
                <div class="search">
                    <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                    <input type="submit" value="SEARCH">

                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="header-bottom-right">
                <div class="account"><a href="login.php"><span> </span>YOUR ACCOUNT</a></div>
                <ul class="login">
                    <?php
                    if (isset($_SESSION['user_info'])) {
                    ?>
                        <li><i class="fa-solid fa-user"></i> <a href=/don-hang><?php echo $_SESSION['user_info']->ten ?></a></li> |
                        <li><a href='logout.php'>ĐĂNG XUẤT</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="login.php"><span> </span>LOGIN</a></li> |
                        <li><a href="register.php">SIGNUP</a></li>
                    <?php
                    }
                    ?>

                </ul>
                <div class="cart"><a href="gio_hang.php"><span> </span>CART</a></div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>