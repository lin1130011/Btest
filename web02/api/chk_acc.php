<?php
include_once "./base.php";
$User = new DB('users');
echo $User->count($_POST);
