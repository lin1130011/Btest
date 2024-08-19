<?php
include_once "./base.php";
$User = new DB('users');
$result = $User->find(['email' => $_GET['email']]);

if (!empty($result)) {
    echo "您的密碼為: {$result['pwd']}";
} else {
    echo "查無資料";
}
