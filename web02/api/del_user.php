<?php
include_once "./base.php";
$User = new DB('users');
foreach ($_POST['ids'] as $key => $value) {
    // dd($value);
    $User->del($value);
}
