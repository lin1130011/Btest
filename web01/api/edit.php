<?php
include_once "./base.php";
$do = $_POST['table'];
$db = ${ucfirst($do)};
unset($_POST['table']);
dd($_POST);
foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $data = $db->find($id);
        switch ($do) {
            case 'title':
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                break;
            case 'ad':
            case 'news':
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            case 'mvim':
            case 'image':
                $data['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            case 'admin':
                $data['acc'] = $_POST['acc'][$key];
                $data['pwd'] = $_POST['pwd'][$key];
                break;
        }

        $db->save($data);
    }
}

to("../admin.php?do=$do");
