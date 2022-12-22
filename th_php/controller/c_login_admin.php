<?php
include_once '../libraries/xl_user.php';
session_start();

class c_login_admin
{
    private $xl_user;
    function __construct()
    {
        $this->xl_user = new xl_user();
    }
    function login_admin()
    {
        if (isset($_POST['login'])) {
            $tai_khoan = ($_POST["tai_khoan"]);
            $password = ($_POST["mat_khau"]);

            if (!$tai_khoan || !$password) {
                echo "<script>alert('Vui lòng nhập đầy đủ tài khoản và mật khẩu')</script>.";
                exit;
            }

            $password = md5($password);

            $query = $this->xl_user->thong_tin_nguoi_dung_quan_tri_theo_tai_khoan($tai_khoan);
            if ($query->tai_khoan != $tai_khoan) {
                echo "<script>alert(' Tài khoản này không tồn tại. Vui lòng kiểm tra lại')</script>";
                exit;
            }

            $row = $query->mat_khau;

            if ($password != $row) {
                echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại.')</script>";
                exit;
            }
            $_SESSION['user_amdin'] = $query;
            echo "<script>alert('Bạn đã đăng nhập thành công')</script>";
            header("location:trang_dashboard.php");
        }
    }
    function logout()
    {
        unset($_SESSION['user_amdin']);
    }
}
