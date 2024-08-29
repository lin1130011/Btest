<?php
include_once "./base.php";

$res = $Users->find(['email' => $_POST['email']]);

if (!empty($res)) {
    echo "您的密碼為 {$res['pwd']}";
} else {
    echo "查無資料";
}
