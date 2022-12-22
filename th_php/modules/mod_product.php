<div class="container">
    <div class="women-product">
        <div class=" w_content">
            <div class="women">
                <a href="#">
                    <?php $controller->ten_loai_san_pham(); ?>
                </a>

                <div class="clearfix"> </div>
            </div>
        </div>
        <?php
        $controller->danh_sach_san_pham_theo_loai();
        ?>
    </div>
    <?php include_once('widgets/categories.php') ?>
</div>