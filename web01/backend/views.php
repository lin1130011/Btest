<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站人數總管理</p>
    <form method="post" action="./api/update_data.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">進站總人數</td>
                    <td width="50%">
                        <?php
                        $View = new DB('views');
                        $row = $View->find(1)['view'];
                        ?>
                        <input type="text" name="view" id="" value="<?= $row ?>">
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
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