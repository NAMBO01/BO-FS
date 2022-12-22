<?php
include_once './libraries/xl_san_pham.php';
session_start();
class c_san_pham
{
    private $xl_san_pham;
    function __construct()
    {
        $this->xl_san_pham = new xl_san_pham();
    }

    function san_pham_noi_bat()
    {
        $list_sp_noi_bat = $this->xl_san_pham->danh_sach_san_pham_noi_bat();
        foreach ($list_sp_noi_bat as $sp_noi_bat) {
            echo '<div class="wmuSliderWrapper">
           <article style="position: absolute; width: 100%; opacity: 0;">
               <div class="banner-matter">
                   <div class="col-md-5 banner-bag">
                       <img class="img-responsive " src="images/hinh_sp/' . $sp_noi_bat->hinh . '" alt=" " />
                   </div>
                   <div class="col-md-7 banner-off">
                       <h2>FLASH SALE 50% 0FF</h2>
                       <label><b>VỚI TẤT CẢ HÓA ĐƠN</b> MUA HÀNG</label>
                       <p>Thanh toán trực tiếp tại cửa hàng bằng tiền mặt / thẻ tín dụng / chuyển
                           khoản (*)
                           / Cổng thanh toán VNPay hoặc Ví điện tử Momo (**). </p>
                       <a href="single.php?id_sp=' . $sp_noi_bat->ID . '">
                           <span class="on-get">Mua Ngay</span>
                       </a>
                   </div>
                   <div class="clearfix"> </div>
               </div>
           </article>
       </div>';
        }
    }
    function san_pham_theo_loai()
    {
        $list_sp_moi = $this->xl_san_pham->danh_sach_san_pham_moi();

        foreach ($list_sp_moi as  $sp_moi) {
            echo '  <div class="col-md-6 con-sed-grid">
                <div class=" elit-grid">
                    <label>' . $sp_moi->ten_san_pham . '</label>
                    <p class="in_par">Trải nghiệm ngay những đôi giày tốt nhất tại cửa hàng chúng tôi!</p>
                    <a href="single.php?id_sp=' . $sp_moi->ID . '"><span class="on-get">MUA NGAY</span></a>
                </div>
                <img class="img-responsive shoe-left" src="images/hinh_sp/' . $sp_moi->hinh . '"
                    alt=" " />
                <div class="clearfix"> </div>
            </div>';
        }
    }
    function mau_ao_moi()
    {
        $mau_ao_moi = $this->xl_san_pham->danh_sach_san_pham_theo_loai(27);
        foreach ($mau_ao_moi as $ao_moi) {
            echo '<div class="col-md-4 chain-grid">
            <a href="single.php?id_sp=' . $ao_moi->ID . '"><img class="img-responsive chain"
                    src="images/hinh_sp/' . $ao_moi->hinh . '" alt=" " /></a>
            <span class="star"></span>
            <div class="grid-chain-bottom">
                <h6>
                    <a href="single.php?id_sp=' . $ao_moi->ID . '">' . $ao_moi->ten_san_pham . '</a>
                </h6>
                <div class="star-price">
                    <div class="dolor-grid">
                        <span class="actual">' . number_format($ao_moi->gia_giam) . 'VND</span><br>
                        <span class="reducedfrom">' . number_format($ao_moi->don_gia) . 'VND</span>
                        <span class="rating">
                            <input type="radio" class="rating-input" id="rating-input-1-5"
                                name="rating-input-1">
                            <label for="rating-input-1-5" class="rating-star1"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-4"
                                name="rating-input-1">
                            <label for="rating-input-1-4" class="rating-star1"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-3"
                                name="rating-input-1">
                            <label for="rating-input-1-3" class="rating-star"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-2"
                                name="rating-input-1">
                            <label for="rating-input-1-2" class="rating-star"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-1"
                                name="rating-input-1">
                            <label for="rating-input-1-1" class="rating-star"> </label>
                        </span>
                    </div>
                    <a class="now-get get-cart" href="gio_hang.php?id_sp=' . $ao_moi->ID . '"
                        data-id-sp="' . $ao_moi->ID . '">THÊM VÀO GIỎ HÀNG</a>
                    <div class="clearfix"> </div>
                </div>
    
            </div>
    
        </div>';
        }
    }

    function mau_giay_moi()
    {
        $mau_giay_moi = $this->xl_san_pham->danh_sach_san_pham_theo_loai(24);
        foreach ($mau_giay_moi as $giay_moi) {
            echo ' <div class="col-md-4 chain-grid">
            <a href="single.php?id_sp=' . $giay_moi->ID . '"><img class="img-responsive chain"
                    src="images/hinh_sp/' . $giay_moi->hinh . '" alt=" " /></a>
            <span class="star"> </span>
            <div class="grid-chain-bottom">
                <h6><a href="single.php?id_sp=' . $giay_moi->ID . '">' . $giay_moi->ten_san_pham . '</a>
                </h6>
                <div class="star-price">
                    <div class="dolor-grid">
                        <span class="actual">' . number_format($giay_moi->gia_giam) . 'VND</span><br>
                        <span class="reducedfrom">' . number_format($giay_moi->don_gia) . 'VND</span>
                        <span class="rating">
                            <input type="radio" class="rating-input" id="rating-input-1-5"
                                name="rating-input-1">
                            <label for="rating-input-1-5" class="rating-star1"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-4"
                                name="rating-input-1">
                            <label for="rating-input-1-4" class="rating-star1"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-3"
                                name="rating-input-1">
                            <label for="rating-input-1-3" class="rating-star"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-2"
                                name="rating-input-1">
                            <label for="rating-input-1-2" class="rating-star"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-1"
                                name="rating-input-1">
                            <label for="rating-input-1-1" class="rating-star"> </label>
                        </span>
                    </div>
                    <a class="now-get get-cart" href="gio_hang.php?id_sp=' . $giay_moi->ID . '"
                        data-id-sp="' . $giay_moi->ID . '">THÊM
                        VÀO GIỎ HÀNG</a>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>';
        }
    }
    function san_pham()
    {
        $san_pham = $this->xl_san_pham->san_pham_theo_id(24);
        foreach ($san_pham as $sp) {
            echo '<div class=" chain-grid menu-chain">
            <a href="/single?id_sp=' . $sp->ID . '"><img class="img-responsive chain" src="images/hinh_sp/' . $sp->hinh . '" alt=" " /></a>
            <div class="grid-chain-bottom chain-watch">
            <h6><a href="single.php?id_sp=' . $sp->ID . '">' . $sp->ten_san_pham . '</a></h6>
                <span class="actual dolor-left-grid">' . number_format($sp->don_gia) . 'VND</span>
                <span class="reducedfrom">' . number_format($sp->gia_giam) . 'VND</span>
            </div>
        </div>
        <a class="view-all all-product" href="product-type.php?id_loai_sp=*">VIEW ALL PRODUCTS<span> </span></a>';
        }
    }

    function chi_tiet_san_pham()
    {
        $sp_single = $this->xl_san_pham->san_pham_theo_id($_GET["id_sp"]);
        $img_more = $this->xl_san_pham->lay_hinh_san_pham($_GET["id_sp"]);
        echo '<ul id="etalage">';
        if (isset($sp_single)) {
            foreach ($sp_single as $sp_s) {
                echo '      <li>
                                <img class="etalage_thumb_image" src="images/hinh_sp/' . $sp_s->hinh . '"
                                    class="img-responsive" />
                                <img class="etalage_source_image" src="images/hinh_sp/' . $sp_s->hinh . '"
                                    class="img-responsive" title="" />
                            </li>';
            }
            // if (isset($img_more)) {
            //     foreach ($img_more as $img) {
            for ($i = 0; $i < $img_more; $i++) {
                echo '  <li>
                                    <img class="etalage_thumb_image" src="images/hinh_sp/' . $img_more[$i]->ten_hinh . '"
                                        class="img-responsive" />
                                    <img class="etalage_source_image" src="images/hinh_sp/' . $img_more[$i]->ten_hinh . '"
                                        class="img-responsive" title="" />
                                </li>';
                // echo '<pre>', print_r("$img_more[$i]->ten_hinh"), '</pre>';
            }
            // }

            echo '  </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="desc1 span_3_of_2">
                <h4>' . $sp_s->ten_san_pham . '</h4>
                <div class="cart-b">
                    <div class="left-n">' . number_format($sp_s->gia_giam) . ' VND
                    <span class="left-n reducedfrom">' . number_format($sp_s->don_gia) . ' VND</span>
                    </div>
                    <a class="now-get get-cart-in" href="gio_hang.php?id_sp=' . $sp_s->ID . '"
                        data-id-sp="' . $sp_s->ID . '">ADD TO CART</a>
                    <div class="clearfix"></div>
                </div>
                <p>' . $sp_s->gioi_thieu . '</p>';
        }
    }

    function san_pham_khac()
    {
        $list_mau_ao_moi = $this->xl_san_pham->danh_sach_san_pham_theo_loai(27);
        echo ' <ul id="flexiselDemo1">';
        if (isset($list_mau_ao_moi)) {
            foreach ($list_mau_ao_moi as $sp) {
                echo '<li><img src="images/hinh_sp/' . $sp->hinh . '" alt="" />
            <div class="grid-flex">

                <a href="single.php?id_sp=' . $sp->ID . '">
                    <p class="in_one_line">
                        ' . $sp->ten_san_pham . '
                    </p>
                </a>
                <p style="margin-top: -20px ">' . number_format($sp->don_gia) . 'VND</p>
            </div>
        </li>';
            }
        }
        echo ' </ul>';
    }
    function danh_sach_san_pham_theo_loai()
    {
        $list_sp = $this->xl_san_pham->danh_sach_san_pham_theo_loai($_GET["id_loai_sp"]);

        if (isset($list_sp)) {
            foreach ($list_sp as $sp) {
                echo ' <div class="grid-product">
            <div class="product-grid">
                <div class="content_box">
                    <a href="single.html"> </a>
                    <div class="left-grid-view grid-view-left">
                        <img src="images/hinh_sp/' . $sp->hinh . '" class="img-responsive watch-right" alt="" />
                        <div class="mask">
                            <div class="info">Quick View</div>
                        </div>
                    </div>
                    <h4><a href="single.php?id_sp=' . $sp->ID . '">' . $sp->ten_san_pham . '</a></h4>
                    <p>It is a long established fact that a reader</p>
                    <span class="actual">' . number_format($sp->gia_giam) . '₫</span><br>
                    <span class="reducedfrom">' . number_format($sp->don_gia) . '</span>
                </div>
            </div>
        </div>';
            }
        }
    }
    function ten_loai_san_pham()
    {
        $name_loai_sp = $this->xl_san_pham->ten_san_pham_theo_loai($_GET["id_loai_sp"]);
        foreach ($name_loai_sp as $name) {
            echo '<h4>' . $name->ten_loai_sp . '</h4>';
        }
    }
    
}
