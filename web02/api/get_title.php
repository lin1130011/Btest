<?php
include_once "./base.php";

$news = $News->all(['type' => $_POST['type']]);

foreach ($news as $key => $value) {
    echo "<p><a href='javascript:getnews({$value['id']})'>{$value['title']}</a></p>";
}
?>



<script></script>