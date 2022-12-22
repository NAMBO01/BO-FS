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

    function danh_sach_san_pham_ban_chay_nhat_theo_thoi_gian($ngay_bat_dau, $ngay_ket_thuc)
    {
        $lenh_sql = "SELECT sp.*, tg.ten_tac_gia, sum(so_luong) as tong_so_luong , sum(thanh_tien) as tong_tien
        FROM bs_san_pham sp, bs_tac_gia tg, bs_ct_don_hang ctdh, bs_don_hang dh
        WHERE s.id_tac_gia = tg.id AND s.id = ctdh.id_sach AND dh.id = ctdh.id_don_hang
        AND dh.trang_thai > 0
        AND ngay_dat BETWEEN '$ngay_bat_dau' AND '$ngay_ket_thuc'
        GROUP BY s.id 
        ORDER BY tong_so_luong DESC, tong_tien DESC LIMIT 0,8";
        //echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

    function dem_so_san_pham_theo_loai($id_loai_san_pham)
    {
        //kiem tra xem có loai san pham con hay khong
        $lenh_sql = "SELECT id FROM bs_loai_san_pham WHERE id_loai_sp = $id_loai_san_pham";
        $this->setQuery($lenh_sql);
        $ds_loai_sach_con = $this->loadAllRow();

        if ($ds_loai_sach_con) {
            //noi chuoi tao list loai con
            $chuoi_loai_con  = "";
            foreach ($ds_loai_sach_con as $loai_con) {
                $chuoi_loai_con .= $loai_con->id . ",";
            }
            $chuoi_loai_con = trim($chuoi_loai_con, ",");

            $lenh_sql = "SELECT count(*) as so_san_pham FROM bs_san_pham WHERE id_loai_sp IN ($chuoi_loai_con)";
        } else {
            $lenh_sql = "SELECT count(*) as so_san_pham FROM bs_san_pham WHERE id_loai_sp = $id_loai_san_pham";
        }
        //echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
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
        $id_tac_gia,
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
        $lenh_sql = "INSERT INTO bs_san_pham(ten_sach, id_tac_gia, gioi_thieu, doc_thu, id_loai_san_pham, id_nha_xuat_ban, so_trang,
    ngay_xuat_ban, kich_thuoc, sku, trong_luong, trang_thai, hinh, don_gia, gia_bia, noi_bat)
                        VALUES('$ten_sach', '$id_tac_gia', '$gioi_thieu', '$doc_thu', '$id_loai_san_pham', '$id_nha_xuat_ban', '$so_trang',
    '$ngay_xuat_ban', '$kich_thuoc', '$sku', '$trong_luong', '$trang_thai', '$hinh', '$don_gia', '$gia_bia', '$noi_bat');";
        //echo $lenh_sql."<br/>";
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function cap_nhat_sach(
        $id_sach,
        $ten_sach,
        $id_tac_gia,
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
        $lenh_sql = "UPDATE  bs_san_pham spET 
                    ten_sach = '$ten_sach',
                    id_tac_gia = '$id_tac_gia',
                    gioi_thieu = '$gioi_thieu',
                    doc_thu = '$doc_thu',
                    id_loai_san_pham = '$id_loai_san_pham',
                    id_nha_xuat_ban = '$id_nha_xuat_ban',
                    so_trang = '$so_trang',
                    ngay_xuat_ban = '$ngay_xuat_ban',
                    kich_thuoc = '$kich_thuoc',
                    sku = '$sku',
                    trong_luong = '$trong_luong',
                    trang_thai = '$trang_thai',
                    hinh = '$hinh',
                    don_gia = '$don_gia',
                    gia_bia = '$gia_bia',
                    noi_bat = '$noi_bat'
                    WHERE id = '$id_sach'
                    ";
        //echo $lenh_sql."<br/>";exit;
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function xoa_sach_theo_id($id_sach)
    {
        $lenh_sql = "DELETE FROM bs_san_pham WHERE id = '$id_sach'";
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
