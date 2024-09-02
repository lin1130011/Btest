<?php
include_once "./base.php";

// dd($_FILES);

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
    $_POST['sh'] = 1;
    $_POST['rank'] = q("select max(`id`) as `max` from `poster`")[0]['max'] + 1;
    $_POST['mode'] = rand(1, 3);
    $Poster->save($_POST);
}

// dd($_POST);
to("../admin.php?do=poster");
