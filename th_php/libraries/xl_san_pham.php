<?php
include_once 'database.php';
class xl_san_pham extends database
{
    function danh_sach_tat_ca_san_pham()
    {
        $lenh_sql = "SELECT * FROM sb_san_pham ";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
    function san_pham_theo_id($id)
    {
        $lenh_sql = "SELECT * FROM sb_san_pham WHERE ID = '$id' ";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
    function danh_sach_san_pham_noi_bat()
    {
        $lenh_sql = "SELECT * FROM sb_san_pham WHERE noi_bat = 1";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

    function danh_sach_san_pham_moi()
    {
        $lenh_sql = "SELECT *FROM sb_san_pham WHERE id_loai_sp = 24  LIMIT 2";
        //echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

    function danh_sach_san_pham_theo_loai($id_loai_san_pham)
    {
        $lenh_sql = "SELECT sp.* FROM sb_san_pham sp JOIN sb_loai_san_pham lsp ON sp.id_loai_sp = lsp.ID_loai_sp WHERE sp.id_loai_sp = $id_loai_san_pham LIMIT 6";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
    function ten_san_pham_theo_loai($id_loai_san_pham)
    {
        $lenh_sql = "SELECT ten_loai_sp FROM sb_loai_san_pham  WHERE id_loai_sp = $id_loai_san_pham ";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
    function thong_tin_san_pham_theo_id($id_sp)
    {
        $lenh_sql = "SELECT *, nsx.ten_nha_san_xuat, lsp.ten_loai_sp FROM sb_san_pham sp
         JOIN sb_nha_san_xuat nsx ON sp.id_nha_san_xuat = nsx.ID
          JOIN sb_loai_san_pham lsp ON lsp.ID_loai_sp = sp.id_loai_sp WHERE sp.id = $id_sp ;";
        //echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }

    function them_san_pham_moi(
        $ten_sach,
        $id_nha_san_xuat,
        $gioi_thieu,
        $doc_thu,
        $id_loai_san_pham,
        $id_nha_xuat_ban,
        $so_trang,
        $ngay_xuat_ban,
        $kich_thuoc,
        $sku,
        $trong_luong,
        $trang_thai,
        $hinh,
        $don_gia,
        $gia_bia,
        $noi_bat
    ) {
        $ten_sach = str_replace("'", "&rsquo;", str_replace('"', "&quot;", $ten_sach));
        $gioi_thieu = str_replace("'", "&rsquo;", str_replace('"', "&quot;", $gioi_thieu));
        $lenh_sql = "INSERT INTO bs_san_pham(ten_sach, id_nha_san_xuat, gioi_thieu, doc_thu, id_loai_san_pham, id_nha_xuat_ban, so_trang,
    ngay_xuat_ban, kich_thuoc, sku, trong_luong, trang_thai, hinh, don_gia, gia_bia, noi_bat)
                        VALUES('$ten_sach', '$id_nha_san_xuat', '$gioi_thieu', '$doc_thu', '$id_loai_san_pham', '$id_nha_xuat_ban', '$so_trang',
    '$ngay_xuat_ban', '$kich_thuoc', '$sku', '$trong_luong', '$trang_thai', '$hinh', '$don_gia', '$gia_bia', '$noi_bat');";
        //echo $lenh_sql."<br/>";
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function cap_nhat_san_pham(
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
    ) {
        $ten_san_pham = str_replace("'", "&rsquo;", str_replace('"', "&quot;", $ten_san_pham));
        $gioi_thieu = str_replace("'", "&rsquo;", str_replace('"', "&quot;", $gioi_thieu));
        $lenh_sql = "UPDATE  bs_san_pham spET 
                    ten_sach = '$ten_san_pham',
                    id_nha_san_xuat = '$id_nha_san_xuat',
                    gioi_thieu = '$gioi_thieu',
                    id_loai_san_pham = '$id_loai_san_pham',
                    sku = '$sku',
                    trang_thai = '$trang_thai',
                    hinh = '$hinh',
                    don_gia = '$don_gia',
                    gia_giam = '$gia_giam',
                    noi_bat = '$noi_bat'
                    WHERE ID = '$id_sp'
                    ";
        //echo $lenh_sql."<br/>";exit;
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function xoa_san_pham_theo_id($id_san_pham)
    {
        $lenh_sql = "DELETE FROM sb_san_pham WHERE ID = '$id_san_pham'";
        //echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }
    function lay_hinh_san_pham($id_sp)
    {
        $lenh_sql = "SELECT ten_hinh FROM sb_hinh_san_pham WHERE id_sp = '$id_sp'";
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }
    function thong_tin_chi_tiet_sp()
    {
        $lenh_sql = "SELECT sp.*,sp.id,nsx.ten_nha_san_xuat,lsp.ten_loai_sp 
        FROM sb_san_pham sp 
        JOIN sb_nha_san_xuat nsx ON sp.id_nha_san_xuat = nsx.id
        JOIN sb_loai_san_pham lsp ON sp.id_loai_sp = lsp.ID_loai_sp";
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }
}
