<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動態文字廣告管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">動態文字廣告</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>

                </tr>
                <?php
                $Ad = new DB($do);
                $data = $Ad->all();
                foreach ($data as $key => $value) : ?>
                    <tr class="cent">
                        <td>
                            <input type="text" name="text[]" id="" value="<?= $value['text'] ?>" style="width:80%;">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                            <input type="hidden" name="id[]" id="" value="<?= $value['id'] ?>">
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modals/<?= $do ?>.php')" value="新增動態文字廣告">
                    </td>
                    <td class="cent"> <input type="hidden" name="table" value="<?= $do; ?>"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>