<?php
include_once "./base.php";

$New = new DB('news');

$news = $New->find($_GET['id']);

echo $news['title'];
echo "<br>";
echo nl2br($news['text']);
