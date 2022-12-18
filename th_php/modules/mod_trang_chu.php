<div class="container">
    <div class="shoes-grid">
        <div class="wrap-in">
            <div class="wmuSlider example1 slide-grid">
                <?php
                $controller->san_pham_noi_bat();
                ?>
                <ul class="wmuSliderPagination">
                    <li><a href="#" class="">0</a></li>
                    <li><a href="#" class="">1</a></li>
                    <li><a href="#" class="">2</a></li>
                </ul>
                <script src="js/jquery.wmuSlider.js"></script>
                <script>
                    $('.example1').wmuSlider();
                </script>
            </div>
        </div>
        </a>
        <!---->
        <div class="shoes-grid-left">
            <?php
            $controller->san_pham_theo_loai();
            ?>

        </div>
        <div class="products">
            <h5 class="latest-product">MẪU ÁO MỚI NHẤT</h5>
            <a class="view-all" href="/product-type?id_loai_sp=ao">XEM TẤT CẢ<span> </span></a>
        </div>
        <div class="product-left">

            <?php
            $controller->mau_ao_moi();
            ?>

            <div class="clearfix"> </div>
        </div>
        <div class="products">
            <h5 class="latest-product">LATEST PRODUCTS</h5>
            <a class="view-all" href="product.html">VIEW ALL<span> </span></a>
        </div>
        <div class="product-left">
            <?php
            $controller->mau_giay_moi();
            ?>

            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <?php include_once("widgets/categories.php"); ?>

    <div class="clearfix"> </div>
</div>