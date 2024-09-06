<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="60%">動畫圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $db = ${ucfirst($do)};
                $data = $db->all();


                foreach ($data as $key => $value) : ?>
                    <tr class="cent">
                        <td>
                            <img style="width: 120px;height:90px" src="./images/<?= $value['img'] ?>" alt="">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                            <input type="hidden" name="id[]" id="" value="<?= $value['id'] ?>">
                            <input type="hidden" name="table" id="" value="<?= $do ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./models/<?= $do ?>_update.php?id=<?= $value['id'] ?>')" value="更換圖片">
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','./models/<?= $do ?>.php')" value="新增動畫圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>