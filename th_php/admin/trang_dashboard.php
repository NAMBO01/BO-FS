<?php
include_once '../controller/c_thong_tin.php';
$controller = new c_thong_tin();

?>
<!DOCTYPE html>
<html>

<head>
    <!-- include head -->
    <?php include_once("widget/head.php"); ?>
    <!-- END include head -->

</head>

<body>
    <?php include_once("widget/header.php"); ?>

    <?php include_once("widget/sidebar.php"); ?>

    <?php include_once("./module/mod_trang_dash_board.php"); ?>

    <?php include_once("widget/footer_script.php"); ?>
</body>

</html>