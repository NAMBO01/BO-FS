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
                       <a href="/single?id_sp=' . $sp_noi_bat->ID . '">
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
                    <a href="/single?id_sp=' . $sp_moi->ID . '"><span class="on-get">MUA NGAY</span></a>
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
            <a href="/single?id_sp=' . $ao_moi->ID . '"><img class="img-responsive chain"
                    src="images/hinh_sp/' . $ao_moi->hinh . '" alt=" " /></a>
            <span class="star"></span>
            <div class="grid-chain-bottom">
                <h6>
                    <a href="/single?id_sp=' . $ao_moi->ID . '">' . $ao_moi->ten_san_pham . '</a>
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
                    <a class="now-get get-cart" href="gio-hang?id_sp=' . $ao_moi->ID . '"
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
            <a href="/single?id_sp=' . $giay_moi->ID . '"><img class="img-responsive chain"
                    src="images/hinh_sp/' . $giay_moi->hinh . '" alt=" " /></a>
            <span class="star"> </span>
            <div class="grid-chain-bottom">
                <h6><a href="/single?id_sp=' . $giay_moi->ID . '">' . $giay_moi->ten_san_pham . '</a>
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
                    <a class="now-get get-cart" href="gio-hang?id_sp=' . $giay_moi->ID . '"
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
        $san_pham = $this->xl_san_pham->thong_tin_san_pham_theo_id(20);
        foreach ($san_pham as $sp) {
            echo '<div class=" chain-grid menu-chain">
            <a href="/single?id_sp=' . $sp->ID . '"><img class="img-responsive chain" src="images/hinh_sp/' . $sp->hinh . '" alt=" " /></a>
            <div class="grid-chain-bottom chain-watch">
                <span class="actual dolor-left-grid">' . number_format($sp->gia_giam) . 'VND</span>
                <span class="reducedfrom">' . number_format($sp->gia_giam) . 'VND</span>
                <h6><a href="/single?id_sp={{ $sp->ID }}">' . $sp->ten_san_pham . '</a></h6>
            </div>
        </div>
        <a class="view-all all-product" href="/product-type?id_loai_sp=*">VIEW ALL PRODUCTS<span> </span></a>';
        }
    }
}
