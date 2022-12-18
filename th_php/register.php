<?php
include_once './controller/c_login.php';
$controller = new c_login();
$controller->register();
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

    <?php include_once("modules/mod_register.php"); ?>

    <?php include_once("widgets/footer.php"); ?>
</body>

</html>