<?php
include_once "./base.php";
$result = $Users->find(['email' => $_POST['email']]);
// dd($_POST);
if (!empty($result)) {
    echo "您的密碼為" . $result['pwd'];
} else {
    echo "查無資料";
}
