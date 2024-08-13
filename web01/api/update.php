<?php
include_once "./base.php";
$table = $_POST['table'];
unset($_POST['table']);
$db = new DB($table);

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], '../images/' . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
$db->save($_POST);

to("../admin.php?do=$table");
?>