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
        // Check if the login form has been submitted.
        if (isset($_POST['login'])) {
            // Get the email and password values from the form.
            $email = ($_POST["email"]);
            $password = ($_POST["mat_khau"]);

            // Check if either the email or password is empty.
            if (!$email || !$password) {
                // Display an alert if either field is empty and exit the function.
                echo "<script>alert('Vui lòng nhập đầy đủ email và mật khẩu')</script>.";
                exit;
            }

            // Hash the password.
            $password = md5($password);

            // Get the user object with the given email.
            $query = $this->xl_user->thong_tin_nguoi_dung_theo_email($email);

            // Check if the email does not exist in the database.
            if ($email != $query->email) {
                // Display an alert and exit the function if the email does not exist.
                echo "<script>alert('Email này không tồn tại. Vui lòng kiểm tra lại')</script>";
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

            // Set the user_info session variable to the user object.
            $_SESSION['user_info'] = $query;

            // Display an alert indicating that the login was successful.
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

            $addmember = $this->xl_user->them_nguoi_dung($email, $ho, $ten, $sdt, $password, $id_loai_user = 1);

            //Thông báo quá trình lưu
            if ($addmember) {
                echo "<script>alert('Quá trình đăng ký thành công')</script>.";
                header("Location:index.php");
            } else {
                echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
            }
        }
        function logout()
        {
            unset($_SESSION['user_info']);
        }
    }
}
