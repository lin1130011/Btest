<?php
include_once "./base.php";
$New = new DB('news');
$news = $New->all(['type' => $_GET['type']]);

foreach ($news as $key => $value) {
    echo "<p><a href='javascript:getnews({$value['id']})'>{$value['title']}</a></p>";
}
