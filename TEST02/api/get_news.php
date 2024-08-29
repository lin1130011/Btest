<?php
include_once "./base.php";
$data = $News->find($_POST['id']);


echo $data['text'];
