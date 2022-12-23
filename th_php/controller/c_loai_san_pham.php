<?php
include_once './libraries/xl_loai_san_pham.php';
class c_loai_san_pham
{
    private $xl_loai_san_pham;
    function __construct()
    {
        $this->xl_loai_san_pham = new xl_loai_san_pham();
    }
    function ds_loai_san_pham()
    {
        $ds_loai_sp = $this->xl_loai_san_pham->danh_sach_loai_san_pham();
        for ($i = 0; $i < count($ds_loai_sp); $i++) {
            echo ' <li';
            if (isset($ds_loai_sp[$i]->ds_con)) {
                if (count($ds_loai_sp[$i]->ds_con) > 0) {

                    ' class="item1"';
                }
            }
            echo ' > ';
            echo '<a href="#">' . $ds_loai_sp[$i]->ten_loai_sp . '<img class="arrow-img" src="images/arrow1.png" alt="" /></a>';
            if (isset($ds_loai_sp[$i]->ds_con)) {
                if (count($ds_loai_sp[$i]->ds_con) > 0) {
                    echo '<ul class="cute">';
                    for ($j = 0; $j < count($ds_loai_sp[$i]->ds_con); $j++) {
                        echo ' <li class="subitem1"><a href="product_type.php?id_loai_sp=' . $ds_loai_sp[$i]->ds_con[$j]->ID_loai_sp . '">' . $ds_loai_sp[$i]->ds_con[$j]->ten_loai_sp . '</a></li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</li>';
        }
    }
}
