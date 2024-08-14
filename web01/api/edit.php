<?php
include_once "./base.php";
$table = $_POST['table'];
unset($_POST['table']);

dd($_POST);
$db = new DB($table);
foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $row = $db->find($id);
        switch ($table) {
            case 'title':
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                $row['text'] = $_POST['text'][$key];
                break;

            case 'ad':
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                $row['text'] = $_POST['text'][$key];
                break;
            case 'mvim':
            case 'image':
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
        }


        $db->save($row);
    }
}
to("../admin.php?do=$table");

?>