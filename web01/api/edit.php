<?php
include_once "./base.php";
$table = $_POST['table'];
unset($_POST['table']);

dd($_POST);
$db = new DB($table);
foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    }
    $row = $db->find($id);

    $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
    $row['text'] = $_POST['text'][$key];

    $db->save($row);
}
?>