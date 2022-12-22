<?php
include_once '../controller/c_san_pham_admin.php';
$controller = new c_san_pham_admin();

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

    <?php include_once("./module/mod_quan_ly_san_pham.php"); ?>

    <?php include_once("widget/footer_script.php"); ?>
</body>

</html>