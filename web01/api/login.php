<?php
include_once "./base.php";

if ($Admin->count($_POST)) {
    $_SESSION['login'] = $_POST['acc'];
    echo $Admin->count($_POST);
}
