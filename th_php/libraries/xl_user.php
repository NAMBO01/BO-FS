<?php
include_once 'database.php';
class xl_user extends database
{
    function thong_tin_nguoi_dung_theo_ten_dang_nhap($ten_dang_nhap)
    {
        $lenh_sql = "SELECT * FROM sb_nguoi_dung WHERE tai_khoan = '$ten_dang_nhap'";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }

    function thong_tin_nguoi_dung_theo_email($email)
    {
        $lenh_sql = "SELECT * FROM sb_user WHERE email = '$email'";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
    function thong_tin_nguoi_dung_quan_tri_theo_email($email)
    {
        $lenh_sql = "SELECT * FROM sb_user WHERE email = '$email' AND ma_loai_user>4";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
    function thong_tin_nguoi_dung_quan_tri_theo_tai_khoan($tai_khoan)
    {
        $lenh_sql = "SELECT * FROM sb_user WHERE tai_khoan = '$tai_khoan' AND id_loai_user>4";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }

    function thong_tin_nguoi_dung_theo_id($id_nguoi_dung)
    {
        $lenh_sql = "SELECT * FROM sb_user WHERE id = '$id_nguoi_dung'";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }

    function them_nguoi_dung($email, $ho, $mat_khau, $ten, $dien_thoai, $ngay_sinh, $ma_loai_user = 1)
    {
        $mat_khau = md5($mat_khau);
        $ngay_hien_tai = date("Y-m-d H:i:s");
        $lenh_sql = "INSERT INTO sb_user(email,ho,mat_khau,ten,ngay_sinh,dia_chi,avatar,dien_thoai,ma_loai_user) 
    	 				VALUES('$email','$ho','$mat_khau','$ten','$ngay_sinh,'$dien_thoai','$ma_loai_user') ";
        //echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function doi_mat_khau($id_nguoi_dung, $mat_khau_moi)
    {
        $mat_khau_moi = md5($mat_khau_moi);
        $lenh_sql = "UPDATE sb_user SET mat_khau = '$mat_khau_moi' WHERE id = '$id_nguoi_dung'";
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function danh_sach_tat_ca_nguoi_dung($lay_thong_tin_quyen_han = false)
    {
        if ($lay_thong_tin_quyen_han) {
            $lenh_sql = "SELECT nd.*,lnd.ten_loai_nguoi_dung FROM sb_user nd, bs_loai_nguoi_dung lnd WHERE nd.id_loai_user = lnd.id";
        } else {
            $lenh_sql = "SELECT * FROM sb_user";
        }

        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

    function cap_nhat_nguoi_dung($ma_user, $email, $ho, $mat_khau, $ten, $ma_loai_user)
    {
        $lenh_sql = "UPDATE  sb_user SET 
                    email = '$email',
                    ho = '$ho',
                    mat_khau = '$mat_khau',
                    ten = '$ten',
                    ma_loai_user = '$ma_loai_user'
                    WHERE id = '$ma_user'
                    ";
        //echo $lenh_sql."<br/>";exit;
        $this->setQuery($lenh_sql);
        $result = $this->execute();
        return $result;
    }

    function danh_sach_loai_user()
    {
        $lenh_sql = "SELECT * FROM loai_user";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
    function dem_nguoi_dung()
    {
        $lenh_sql = "SELECT COUNT(*) as so_luong_khach_hang
        FROM sb_user WHERE id_loai_user < 5";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
}
