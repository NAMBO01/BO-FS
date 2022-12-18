<?php
include_once './controller/c_loai_san_pham.php';
$controller_2 = new c_loai_san_pham();
?>
<div class="sub-cate">
    <div class=" top-nav rsidebar span_1_of_left">
        <h3 class="cate">CATEGORIES</h3>
        <ul class="menu">
            <?php $controller_2->ds_loai_san_pham(); ?>
            <ul class="kid-menu ">
                <li class="menu-kid-left"><a href="contact.html">Contact us</a></li>
            </ul>
        </ul>
    </div>
    <!--initiate accordion-->

    <div class=" chain-grid menu-chain">
        <a href="single.html"><img class="img-responsive chain" src="images/wat.jpg" alt=" " /></a>
        <div class="grid-chain-bottom chain-watch">
            <span class="actual dolor-left-grid">300$</span>
            <span class="reducedfrom">500$</span>
            <h6><a href="single.html">Lorem ipsum dolor</a></h6>
        </div>
    </div>
    <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a>
</div>