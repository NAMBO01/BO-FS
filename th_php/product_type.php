<?php
include_once './controller/c_san_pham.php';
$controller = new c_san_pham();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- include head -->
    <?php include_once("widgets/head.php"); ?>
    <!-- END include head -->

</head>

<body>
    <?php include_once("widgets/header.php"); ?>

    <?php include_once("modules/mod_product.php"); ?>

    <?php include_once("widgets/footer.php"); ?>
</body>

</html>