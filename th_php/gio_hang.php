<?php
include_once './controller/c_cart.php';

$controller = new c_cart();
?>
<?php error_reporting(0); ?>


<!DOCTYPE html>

<html>

<head>
    <!-- include head -->
    <?php include_once("widgets/head.php"); ?>
    <!-- END include head -->

</head>

<body>
    <?php include_once("widgets/header.php"); ?>

    <?php include_once("modules/mod_cart.php"); ?>

    <?php include_once("widgets/head.php"); ?>

</body>

</html>