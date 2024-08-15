<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">主選單名稱</td>
                    <td width="23%">選單連結網址</td>
                    <td>次選單數</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
            </tbody>
            <?php
            $db = new DB($do);
            $rows = $db->all(['main_id'=>0]);
            foreach ($rows as $key => $value) {
                ?>
                <tr class="cent">
                    <td width="45%">
                        <input type="text" name="text[]" id="" value="<?=$value['text']?>">
                    </td>
                    <td width="23%">
                        <input type="text" name="href[]" id="" value="<?= $value['href'] ?>">
                    </td>
                    <td>
                        <?= $db->count(['main_id' => $value['id']])?>
                    </td>
                    <td width="7%">
                        <input type="radio" name="sh" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? 'checked' : '' ?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                    </td>
                    <td>
                        <input type="button" value="編輯次選單"
                            onclick="op('#cover','#cvr','./modals/submenu.php?id=<?= $value['id'] ?>')">
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
                        <input type="button" onclick="op('#cover','#cvr','./modals/<?= $do; ?>.php')" value="新增主選單">
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