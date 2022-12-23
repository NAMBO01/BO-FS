<?php
session_start();
unset($_SESSION["user_amdin"]);
header("Location:index.php");
