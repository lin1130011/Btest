<?php
include_once "./base.php";
$table = $_POST['table'];
unset($_POST['table']);
$db = new DB($table);
$_POST['id'] = 1;

$db->save($_POST);

to("../admin.php?do={$table}");
?>