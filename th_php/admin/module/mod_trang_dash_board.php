<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box blue-bg">
                    <i class="fa fa-user"></i>
                    <div class="count">6.674</div>
                    <div class="title">Khách hàng mới</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box brown-bg">
                    <i class="fa fa-user"></i>
                    <?php $controller->so_nguoi_dung(); ?>
                    <div class="title">Khách Hàng</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg">
                    <i class="fa fa-shopping-cart"></i>
                    <?php $controller->tong_don_hang(); ?>

                    <div class="title">Đơn hàng</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                    <i class="fa fa-cubes"></i>
                    <?php $controller->tong_doanh_thu(); ?>


                    <div class="title">Doanh thu</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

        </div>
        <!--/.row-->
        <div class="post-container">
            <div class="poster fade">
                <img src="img/banner-san-pham.jpg" alt="" style="width:100%; height:500px">
            </div>
            <div class="poster fade">
                <img src="img/banner_2.jpg" alt="" style="width:100%; height:500px">
            </div>
            <div class="poster fade">
                <img src="img/banner_3.jpg" alt="" style="width:100%; height:500px">
            </div>

            <br>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

        </div>

        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("poster");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 3000);
            }
        </script>
    </section>
</section>