<?php
include_once "./base.php";

$User = new DB('users');

unset($_POST['pwd2']);
// dd($_POST);
echo $User->save($_POST);
