<?php
include_once '../libraries/xl_san_pham.php';
session_start();
class c_san_pham_admin
{
    private $xl_san_pham_admin;
    function __construct()
    {
        $this->xl_san_pham_admin = new xl_san_pham();
    }
    function ds_san_pham_admin()
    {
        $ds_san_pham = $this->xl_san_pham_admin->thong_tin_chi_tiet_sp();
        foreach ($ds_san_pham as $san_pham) {
            echo ' <tr>
            <td>' . $san_pham->ten_san_pham . '</td>
            <td>' . $san_pham->ten_loai_sp . '</td>
            <td>' . $san_pham->don_gia . '</td>

            <td><img src="/images/hinh_sp/' . $san_pham->hinh . '" style="height:70px;" alt=""></td>


            <td>' . $san_pham->ten_nha_san_xuat . '</td>
            <td>' . $san_pham->noi_bat ? 1 : 0 . '</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-primary" href="/admin/ql-san-pham/edit/' . $san_pham->id . '"><i class="icon_pencil"></i></a>
                    <a class="btn btn-danger" onclick="return confirm_delete();" href="/admin/ql-san-pham/delete/' . $san_pham->id . '"><i class="icon_trash"></i></a>
                </div>
            </td>
        </tr> ';
        }
    }
}
