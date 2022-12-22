<?php
include_once '../libraries/xl_user.php';
include_once '../libraries/xl_don_hang.php';
session_start();
class c_thong_tin
{
    private $xl_thong_tin;
    private $xl_tt_don_hang;
    function __construct()
    {
        $this->xl_thong_tin = new xl_user();
        $this->xl_tt_don_hang = new xl_don_hang();
    }
    function so_nguoi_dung()
    {
        $khach_hang = $this->xl_thong_tin->dem_nguoi_dung();
        if (isset($khach_hang)) {
            foreach ($khach_hang as $user) {
                echo ' <div class="count">' . $user->so_luong_khach_hang . '</div>';
            }
        }
    }

    function tong_don_hang()
    {
        $tong_so_luong = $this->xl_tt_don_hang->tong_so_luong_don_hang();
        if (isset($tong_so_luong)) {
            foreach ($tong_so_luong as $tsl) {
                echo '<div class="count">' . $tsl->tong_so_luong . '</div>';
            }
        }
    }
    function tong_doanh_thu()
    {
        $doanh_thu = $this->xl_tt_don_hang->doanh_thu();
        if (isset($doanh_thu)) {
            foreach ($doanh_thu as $dt) {
                echo '<div class="count">' . number_format($dt->tong_doanh_thu) . '₫</div>';
            }
        }
    }
}
