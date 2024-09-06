<?php
include_once "./base.php";

if ($Admin->count($_POST)) {
    $_SESSION['login'] = 1;
}
to("../admin.php");
