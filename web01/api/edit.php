<?php
include_once "./base.php";

$table = $_POST['table'];
$db = new DB($table);
dd($_POST);

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $data = $db->find($id);

        switch ($table) {
            case 'menu':
                $data['text'] = $_POST['text'][$key];
                $data['href'] = $_POST['href'][$key];
                if (isset($_POST['sh']) && in_array($id, $_POST['sh'])) {
                    $data['sh'] = 1;
                } else {
                    $data['sh'] = 0;
                }
                break;
            case 'admin':
                $data['acc'] = $_POST['acc'][$key];
                $data['pwd'] = $_POST['pwd'][$key];
                break;
            case 'title':
                $data['text'] = $_POST['text'][$key];
                if (isset($_POST['sh']) && $_POST['sh'] == $id) {
                    $data['sh'] = 1;
                } else {
                    $data['sh'] = 0;
                }
                break;
            case 'ad':
            case 'news':
                $data['text'] = $_POST['text'][$key];
                if (isset($_POST['sh']) && in_array($id, $_POST['sh'])) {
                    $data['sh'] = 1;
                } else {
                    $data['sh'] = 0;
                }
                break;

            case 'mvim':
            case 'image':
                if (isset($_POST['sh']) && in_array($id, $_POST['sh'])) {
                    $data['sh'] = 1;
                } else {
                    $data['sh'] = 0;
                }
                break;
        }
        $db->save($data);
    }
}

to("../admin.php?do=$table");
