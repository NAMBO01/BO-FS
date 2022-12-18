<?php
session_start();
unset($_SESSION["user_info"]);
header("location: " . $_SERVER["HTTP_REFERER"]);
