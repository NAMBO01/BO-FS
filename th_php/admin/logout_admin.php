<?php
session_start();
unset($_SESSION["user_amdin"]);
header("location: " . $_SERVER["HTTP_REFERER"]);
