<?php
include_once "./base.php";
$User = new DB('users');
$chk = $User->count($_POST);
// dd($_POST);
if ($chk) {
    $_SESSION['user'] = $_POST['acc'];
    echo $chk;
}
