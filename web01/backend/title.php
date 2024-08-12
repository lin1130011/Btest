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
            </tbody>
            <?php
            $db = new DB($do);
            $rows = $db->all();
            foreach ($rows as $key => $value) {
                ?>
                <tr class="cent">
                    <td width="45%">
                        <img src="./images/<?= $value['img'] ?>" alt="" style="width: 300px;height: 30px;">
                    </td>
                    <td width="23%">
                        <input type="text" name="text[]" id="" value="<?= $value['text'] ?>">
                    </td>
                    <td width="7%">
                        <input type="radio" name="sh" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? 'checked' : '' ?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                    </td>
                    <td>
                        <input type="button" value="更換圖片"
                            onclick="op('#cover','#cvr','./modals/<?= $do; ?>_update.php?id=<?= $value['id'] ?>')">
                        <input type="hidden" name="id[]" value="<?= $value['id']; ?>">
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modals/<?= $do; ?>.php')" value="新增網站標題圖片">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="<?= $do ?>">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>