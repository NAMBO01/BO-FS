<?php
include_once 'database.php';
class xl_don_hang extends database
{
    function tong_so_luong_don_hang()
    {
        $lenh_sql = "SELECT COUNT(*) as tong_so_luong
        FROM sb_don_hang";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
    function doanh_thu()
    {
        $lenh_sql = "SELECT SUM(dh.tong_tien) as tong_doanh_thu
        FROM sb_don_hang dh JOIN sb_user s ON s.ID = dh.id_nguoi_dung
        WHERE s.id_loai_user < 5;";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
}
