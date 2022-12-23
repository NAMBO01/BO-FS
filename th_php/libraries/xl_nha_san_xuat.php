<?php
include_once 'database.php';
class xl_nha_san_xuat extends database
{

    function ds_nha_san_xuat()
    {
        $lenh_sql = "SELECT * FROM sb_nha_san_xuat ";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
}
