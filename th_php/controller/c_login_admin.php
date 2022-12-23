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
        // Check if the login form has been submitted.
        if (isset($_POST['login'])) {
            // Get the username and password values from the form.
            $tai_khoan = ($_POST["tai_khoan"]);
            $password = ($_POST["mat_khau"]);

            // Check if either the username or password is empty.
            if (!$tai_khoan || !$password) {
                // Display an alert if either field is empty and exit the function.
                echo "<script>alert('Vui lòng nhập đầy đủ tài khoản và mật khẩu')</script>.";
                exit;
            }

            // Hash the password.
            $password = md5($password);

            // Get the user object with the given username.
            $query = $this->xl_user->thong_tin_nguoi_dung_quan_tri_theo_tai_khoan($tai_khoan);

            // Check if the username does not exist in the database.
            if ($query->tai_khoan != $tai_khoan) {
                // Display an alert and exit the function if the username does not exist.
                echo "<script>alert(' Tài khoản này không tồn tại. Vui lòng kiểm tra lại')</script>";
                exit;
            }

            // Get the hashed password stored in the database.
            $row = $query->mat_khau;

            // Check if the entered password does not match the stored password.
            if ($password != $row) {
                // Display an alert and exit the function if the passwords do not match.
                echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại.')</script>";
                exit;
            }

            // Set the user_amdin session variable to the user object.
            $_SESSION['user_amdin'] = $query;

            // Display an alert indicating that the login was successful.
            echo "<script>alert('Bạn đã đăng nhập thành công')</script>";

            // Redirect the user to the dashboard page.
            header("location:trang_dashboard.php");
        }
    }
    function logout()
    {
        unset($_SESSION['user_amdin']);
    }
}
