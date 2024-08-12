<?php
include_once "./base.php";
dd($_POST);
$Admin = new DB('admin');

if ($Admin->count($_POST)) {
    to("../admin.php");
} else {
    echo "???";
}
?>