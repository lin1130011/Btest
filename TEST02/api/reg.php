<?php
include_once "./base.php";

unset($_POST['pwd2']);

$Users->save($_POST);
