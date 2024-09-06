<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $db = ${ucfirst($do)};
                $data = $db->all();

                foreach ($data as $key => $value) : ?>
                    <tr class="cent">
                        <td>
                            <img src="./images/<?= $value['img'] ?>" alt="<?= $value['text'] ?>" style="width: 300px; height:30px">
                        </td>
                        <td>
                            <input type="text" name="text[]" id="" value="<?= $value['text'] ?>">
                        </td>
                        <td>
                            <input type="radio" name="sh" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./models/<?= $do ?>_update.php?id=<?= $value['id'] ?>')" value="更新圖片">
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
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./models/<?= $do ?>.php')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
</div>