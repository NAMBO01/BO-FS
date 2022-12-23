<?php
include_once '../libraries/xl_san_pham.php';
$xl_san_pham = new xl_san_pham();
$id_sp = $_GET['id'];
$xl_san_pham->xoa_san_pham_theo_id($id_sp);
