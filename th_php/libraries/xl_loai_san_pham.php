<?php
include_once 'database.php';
class xl_loai_san_pham extends database
{
    function danh_sach_loai_san_pham()
    {
        $lenh_sql = "SELECT * FROM sb_loai_san_pham WHERE id_loai_cha = 0";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();

        //load tat ca danh sach loai con vao trong loai cha
        foreach ($result as $item) {
            $ds_con = $this->danh_sach_loai_sp_con($item->ID_loai_sp);
            if ($ds_con) {
                $item->ds_con = $ds_con;
            }
        }

        return $result;
    }

    function danh_sach_loai_sp_con($id_loai_sp_cha)
    {
        $lenh_sql = "SELECT * FROM sb_loai_san_pham WHERE id_loai_cha = $id_loai_sp_cha";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
}
