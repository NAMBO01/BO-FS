<?php
include_once './libraries/xl_san_pham.php';
session_start();
class c_cart
{
    private $xl_gio_hang;
    function __construct()
    {
        $this->xl_gio_hang = new xl_san_pham();
    }
    function gio_hang()
    {
        $allow_update_cart = true;
        $gio_hang = [];
        if (isset($_SESSION["gio_hang"])) {
            $gio_hang = ($_SESSION["gio_hang"]);

            // echo '<pre>',print_r($gio_hang) ,'</pre>';
        }

        $tong_tien = 0;
        foreach ($gio_hang as $sp) {
            $tong_tien += $sp->so_luong * $sp->don_gia;
        }
        if (isset($_SESSION["gio_hang"])) {
            if (count($_SESSION["gio_hang"]) > 0) {
                echo '<!-- Shopping Cart-->
        <div class="table-responsive shopping-cart">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        if ($allow_update_cart)
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Giá được giảm</th>
                        }
                        <th class="text-center">Thành tiền</th>
                        if ($allow_update_cart)
                        <th class="text-center"><a class="btn btn-sm btn-outline-danger" onclick="xoa_gio_hang(event)" href="#">Xóa toàn bộ</a>
                        </th>
                        }
                    </tr>
                </thead>
                <tbody>';
                foreach ($_SESSION["gio_hang"] as $sp_gio_hang) {
                    echo '<tr id="san_pham_' . $sp_gio_hang->ID . '">
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img src="/images/hinh_sp/' . $sp_gio_hang->hinh . '}" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="#">' . $sp_gio_hang->ten_san_pham . '</a>
                                    </h4>
                                    <span><em>Size:</em>
                                    </span><span><em>Color:</em> Dark Blue</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="count-input">';
                    if ($allow_update_cart) {
                        echo ' <input class="so_luong_input" id="so_luong_' . $sp_gio_hang->ID . '" onchange="thay_doi_so_luong_gio_hang(' . $sp_gio_hang->ID . ')" type="number" class="form-control" name="" id="" value="' . $sp_gio_hang->so_luong . '">';
                    } else {
                        $sp_gio_hang->so_luong;
                    }
                    echo '</div>
                        </td>';
                    if ($allow_update_cart) {
                        echo '<td id="don_gia_' . $sp_gio_hang->ID . '" class="text-center text-lg text-medium">' .
                            number_format($sp_gio_hang->don_gia) . ' đ </td>
                        <td id="gia_duoc_giam_' . $sp_gio_hang->ID . '" class="text-center text-lg text-medium">' .
                            number_format($sp_gio_hang->gia_giam) . 'đ</td>';
                    }
                }
                echo '<td class="thanh_tien" id="thanh_tien_' . $sp_gio_hang->ID . '" class="text-center text-lg text-medium">
                            number_format($sp_gio_hang->gia_giam * $sp_gio_hang->so_luong) đ</td>';
                if ($allow_update_cart) {
                    echo '<td class="text-center"><a class="remove-from-cart" onclick="nut_thung_rac(event, ' . $sp_gio_hang->ID . ')" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a>
                        </td>';
                }
            }
            echo ' </tr>';
        }
        echo ' </tbody>
            </table>
        </div>';

        if ($allow_update_cart) {
            echo '<div class="shopping-cart-footer">';
        }
        echo '  <div class="column text-lg text-right" id="tong_tien">Tổng tiền: <span class="text-medium">' . number_format($_SESSION["tong_tien"]) . '
                    đ</span>
            </div>
        </div>';
        if ($allow_update_cart) {
            echo ' <div class="shopping-cart-footer">
            <div class="column">
                <a class="btn btn-outline-secondary" href="/">
                    <i class="icon-arrow-left"></i>
                    &nbsp;Quay lại trang chủ</a>
            </div>
            <div class="column">
                <a class="btn btn-primary" href="thanh_toan.php" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" {{-- data-toast-message="is updated successfully!">Cập nhật giỏ hàng</a>
                    <a class="btn btn-success" --}} href="thanh_toan.php">Thanh toán</a>
            </div>
        </div>';
        } else {
            echo '<div class="container">
            <div class="notice">
                <h3>không có sản phẩm trong giỏ hàng</h3>
            </div>
        </div>';
        }
    }
}
