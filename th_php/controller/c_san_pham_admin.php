<?php
// Include the xl_san_pham and xl_loai_san_pham libraries
include_once '../libraries/xl_san_pham.php';
include_once '../libraries/xl_loai_san_pham.php';
include_once '../libraries/xl_nha_san_xuat.php';

// Start a new session
session_start();

// Define the c_san_pham_admin class
class c_san_pham_admin
{
    // Declare private properties
    private $xl_san_pham_admin;
    private $xl_loai_sp_admin;
    private $xl_nsx_admin;

    // Define the constructor
    function __construct()
    {
        // Initialize the xl_san_pham_admin and xl_loai_sp_admin properties with new instances of the xl_san_pham and xl_loai_san_pham classes, respectively
        $this->xl_san_pham_admin = new xl_san_pham();
        $this->xl_loai_sp_admin = new xl_loai_san_pham();
        $this->xl_nsx_admin = new xl_nha_san_xuat();
    }

    // Define the info_san_pham method
    function info_san_pham()
    {
        // Retrieve product information from the xl_san_pham class using the san_pham_theo_id method
        $info_product = $this->xl_san_pham_admin->san_pham_theo_id($_GET["id_sp"]);
        // Iterate over the product information
        foreach ($info_product as $ip) {
            // Output HTML code that includes the product name in an input field
            echo '    <div class="form-group">
                <div class="col-md-3">
                    Tên sản phẩm
                </div>
                <div class="col-md-9">
                    <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" value="' .  $ip->ten_san_pham . '" required="required" title="">
                </div>
            </div>';
        }
    }

    // Define the select_loai_sp method
    function select_loai_sp()
    {
        // Retrieve a list of product categories from the xl_loai_san_pham class using the loai_san_pham method
        $list_loai_sp = $this->xl_loai_sp_admin->loai_san_pham();

        // Check if the list of categories is set
        if (isset($list_loai_sp)) {
            // Iterate over the list of categories
            foreach ($list_loai_sp as $l_sp) {
                // Output HTML code that includes a dropdown list of the categories
                echo '<option value="' . $l_sp->ID_loai_sp . '">' . $l_sp->ID_loai_sp . ' -
            <span>' . $l_sp->ten_loai_sp . '</span></span>
        </option>';
            }
        }
    }
    // Define the ds_san_pham_admin method
    function ds_san_pham_admin()
    {
        // Retrieve a list of products from the xl_san_pham class using the thong_tin_chi_tiet_sp method
        $ds_san_pham = $this->xl_san_pham_admin->thong_tin_chi_tiet_sp();

        // Iterate over the list of products
        foreach ($ds_san_pham as $san_pham) {
            // Output HTML code that includes a table of the products, along with their names, categories, prices, images, manufacturers, and whether they are featured or not
            echo ' <tr>
             <td>' . $san_pham["ten_san_pham"] . '</td>
             <td>' . $san_pham["ten_loai_sp"] . '</td>
             <td>' . $san_pham["don_gia"] . '</td>
 
             <td><img src="../images/hinh_sp/' . $san_pham["hinh"] . '" style="height:70px;" alt=""></td>
 
 
             <td>' . $san_pham["ten_nha_san_xuat"] . '</td>
             <td>';

            // Check if the product is featured
            if ($san_pham["noi_bat"]) {
                // Output 1 if the product is featured
                echo 1;
            } else {
                // Output 0 if the product is not featured
                echo 0;
            }

            // Close the table cell and output the buttons for editing and deleting products
            echo '</td>
             <td>
                 <div class="btn-group">
                     <a class="btn btn-primary" href="trang_edit_san_pham.php?id_sp=' . $san_pham["id"] . '"><i class="icon_pencil"></i></a>
                    <a class="btn btn-danger" onclick="return confirm_delete();" href="delete.php?id=' . $san_pham["id"] . '"><i class="icon_trash"></i></a>
                </div>
            </td>
        </tr> ';
        }
    }

    function info_edit()
    {
        $id_sp = $_GET["id_sp"];
        if (isset($id_sp)) {
            $info_product = $this->xl_san_pham_admin->san_pham_theo_id($id_sp);
        }
        $ds_nsx = $this->xl_nsx_admin->ds_nha_san_xuat();
        foreach ($info_product as $ip) {

            echo ' <div class="form-group">
                <div class="col-md-3">
                    Giới thiệu
                </div>
                <div class="col-md-9">
                    <textarea cols="30" rows="10" name="gioi_thieu" id="gioi_thieu" class="form-control">' . $ip->gioi_thieu . '</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Đơn giá
                </div>
                <div class="col-md-9">
                    <input type="text" name="don_gia" id="don_gia" class="form-control" value="' . $ip->don_gia . '" required="required" title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Giá giảm
                </div>
                <div class="col-md-9">
                    <input type="text" name="gia_giam" id="gia_giam" class="form-control" value="' . $ip->gia_giam . '" required="required" title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    SKU
                </div>
                <div class="col-md-9">
                    <input type="text" name="sku" id="sku" class="form-control" value="' . $ip->sku . '" required="required" title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Nhà sản xuất
                </div>
                <div class="col-md-9">
                    <select name="id_nha_san_xuat" id="id_nha_san_xuat" class="form-control" value="" required="required" name="" id="">';
            if (isset($ds_nsx)) {
                foreach ($ds_nsx as $nsx) {
                    echo '<option value="' . $nsx->ID . '">' . $nsx->ID . ' -
                            <span>' . $nsx->ten_nha_san_xuat . '</span></span>
                        </option>';
                }
            }
            echo '  </select>

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Nổi bật
                </div>
                <div class="col-md-9">
                    <Select name="noi_bat" id="noi_bat" class="form-control" value="" required="required">
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </Select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Trạng thái
                </div>
                <div class="col-md-9">
                    <Select name="trang_thai" id="trang_thai" class="form-control" value="" required="required">
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </Select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Hình sản phẩm
                </div>
                <div class="col-md-9">
                    <input type="file" name="hinh" id="hinh" class="form-control">
                    <div id="image-holder">
                        <img src="../images/hinh_sp/' . $ip->hinh . '" name="hinh" alt="thumb-image">
                    </div>
                </div>
                <script>
                    $("#hinh").on("change", function() {

                        if (typeof(FileReader) != "undefined") {

                            var image_holder = $("#image-holder");
                            image_holder.empty();

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);

                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[0]);
                        } else {
                            alert("This browser does not support FileReader.");
                        }
                    });
                </script>
            </div>';
        }
    }
    function cap_nhat()
    {

        $id_sp = $_GET['id_sp'];
        $ten_san_pham = $_POST['ten_san_pham'];
        $id_nha_san_xuat = $_POST['id_nha_san_xuat'];
        $gioi_thieu = $_POST['gioi_thieu'];
        $id_loai_san_pham = $_POST['id_loai_san_pham'];
        $sku = $_POST['sku'];
        $trang_thai = $_POST['trang_thai'];
        $hinh = $_POST["hinh"];
        $don_gia = $_POST['don_gia'];
        $don_gia = $_POST['don_gia'];
        $gia_giam = $_POST['gia_giam'];
        $noi_bat = $_POST['noi_bat'];
        if (isset($_POST['update'])) {
            $this->xl_san_pham_admin->cap_nhat_san_pham(
                $id_sp,
                $ten_san_pham,
                $id_nha_san_xuat,
                $gioi_thieu,
                $id_loai_san_pham,
                $sku,
                $trang_thai,
                $hinh,
                $don_gia,
                $gia_giam,
                $noi_bat
            );
        }
    }
}
