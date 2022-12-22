<?php
include_once './libraries/xl_user.php';
session_start();

class c_login
{
    private $xl_user;
    function __construct()
    {
        $this->xl_user = new xl_user();
    }
    function login()
    {
        if (isset($_POST['login'])) {
            $email = ($_POST["email"]);
            $password = ($_POST["mat_khau"]);

            if (!$email || !$password) {
                echo "<script>alert('Vui lòng nhập đầy đủ email và mật khẩu')</script>.";
                exit;
            }

            $password = md5($password);

            $query = $this->xl_user->thong_tin_nguoi_dung_theo_email($email);
            if ($email != $query->email) {
                echo "<script>alert('Email này không tồn tại. Vui lòng kiểm tra lại')</script>";
                exit;
            }

            $row = $query->mat_khau;

            if ($password != $row) {
                echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại.')</script>";
                exit;
            }
            $_SESSION['user_info'] = $query;
            echo "<script>alert('Bạn đã đăng nhập thành công')</script>";
        }
    }
    

    function register()
    {

        if (isset($_POST['btn_submit'])) {

            $email      = ($_POST["email"]);
            $password   = ($_POST["mat_khau"]);
            $ho   = ($_POST["ho"]);
            $ten   = ($_POST["ten"]);
            $sdt   = ($_POST["sdt"]);
            $ngay_sinh = ($_POST["ngay_sinh"]);
            //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
            if (!$password || !$email || !$ho || !$ten || !$sdt) {
                echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }

            // Mã khóa mật khẩu
            $password = md5($password);


            //Kiểm tra email đã có người dùng chưa
            if ($this->xl_user->thong_tin_nguoi_dung_theo_email($_POST["email"]) > 0) {
                echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }

            $addmember = $this->xl_user->them_nguoi_dung($email, $ho, $ten, $sdt, $ngay_sinh, $password, $id_loai_user = 1);

            //Thông báo quá trình lưu
            if ($addmember)
                echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
            else
                echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
        }
    }
    function logout()
    {
        unset($_SESSION['user_info']);
    }
}
