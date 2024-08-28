<?php
include_once "./base.php";

$chk_pw = $Users->count($_POST);

if ($chk_pw) {
    $_SESSION['user'] = $_POST['acc'];
    echo $chk_pw;
}
