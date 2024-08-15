<h3 class='cent'>新增最新消息資料</h3>
<hr>

<form action="./api/add.php" method="post">
    <table>

        <tr>
            <td>最新消息資料</td>
            <td><input type="text" name="text" id="text"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="table" value='news'>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            <td></td>
        </tr>
    </table>
</form>