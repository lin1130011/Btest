<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">動畫圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $Mvim = new DB($do);
                $data = $Mvim->all();
                foreach ($data as $key => $value) : ?>
                    <tr class="cent">
                        <td>
                            <img src="./images/<?= $value['img'] ?>" alt="" style="width: 150px; height: 120px;">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modals/<?= $do ?>_update.php?id=<?= $value['id'] ?>')" value="更換動畫">
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
                        <input type="button" onclick="op('#cover','#cvr','./modals/<?= $do ?>.php')" value="新增動畫圖片">
                    </td>
                    <td class="cent"> <input type="hidden" name="table" value="<?= $do; ?>"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>