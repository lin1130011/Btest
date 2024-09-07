<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">管理者帳號</td>
                    <td width="45%">密碼</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
                $db = ${ucfirst($do)};
                $data = $db->all();

                foreach ($data as $key => $value) : ?>
                    <tr class="cent">
                        <td>
                            <input type="text" name="acc[]" id="" value="<?= $value['acc'] ?>">
                        </td>
                        <td>
                            <input type="password" name="pwd[]" id="" value="<?= $value['pwd'] ?>">
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                        </td>
                        <td>
                            <input type="hidden" name="id[]" value="<?= $value['id'] ?>">
                            <input type="hidden" name="table" value="<?= $do ?>">
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <table style=" margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./models/<?= $do ?>.php')" value="新增管理者帳號"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
</div>