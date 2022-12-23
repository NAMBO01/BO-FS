<?php
include_once './controller/c_loai_san_pham.php';
include_once './controller/c_san_pham.php';
$controller_2 = new c_loai_san_pham();
$controller = new c_san_pham();
?>
<div class="sub-cate">
    <div class=" top-nav rsidebar span_1_of_left">
        <h3 class="cate">CATEGORIES</h3>
        <ul class="menu">
            <?php $controller_2->ds_loai_san_pham(); ?>
            <ul class="kid-menu ">
                <li class="menu-kid-left"><a href="contact.php">Contact us</a></li>
            </ul>
        </ul>
    </div>
    <!--initiate accordion-->

    <?php
    $controller->san_pham();
    ?>

</div>