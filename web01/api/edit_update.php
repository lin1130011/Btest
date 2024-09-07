<?php
include_once "./base.php";
$do = $_POST['table'];
unset($_POST['table']);
$db = ${ucfirst($do)};


$db->save($_POST);

to("../admin.php?do=$do");
