<?php
include_once "./base.php";
$do = $_POST['table'];
$db = ${ucfirst($do)};
unset($_POST['table']);

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}


$db->save($_POST);

to("../admin.php?do=$do");
