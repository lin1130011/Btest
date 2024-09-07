<?php include_once "../api/base.php" ?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/menu_change.php" enctype="multipart/form-data" method="post">
    <table style="width:70%;margin:auto;" id="submenu">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        $data = $Menu->all(['main_id' => $_GET['id']]);
        foreach ($data as $key => $value) : ?>
            <tr>
                <td>
                    <input type="text" name="text[]" id="" value="<?= $value['text'] ?>">
                </td>
                <td>
                    <input type="text" name="href[]" id="" value="<?= $value['href'] ?>">
                </td>
                <td>
                    <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                </td>
            </tr>
            <input type="hidden" name="id[]" value="<?= $value['id']; ?>">
            <input type="hidden" name="table" value='menu'>
            <input type="hidden" name="main_id" value="<?= $_GET['id']; ?>">
        <?php endforeach ?>
    </table>
    <div class="cent">

        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="addSub()">
    </div>
</form>
<script>
    function addSub() {
        let str = `<tr>
                <td><input type="text" name="text2[]" ></td>
                <td><input type="text" name="href2[]" ></td>
                <td></td>
            </tr>`
        $("#submenu").append(str)
    }
</script>