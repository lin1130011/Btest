<?php
include_once "./base.php";
dd($_POST);
$Admin = new DB('admin');

if ($Admin->count($_POST)) {
    $_SESSION['login'] = 1;
    to("../admin.php");
} else {
    echo "???";
}
?>