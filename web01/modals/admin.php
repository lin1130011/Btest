<h3 class='cent'>新增管理者帳號</h3>
<hr>

<form action="./api/add.php" method="post">
    <table>

        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="text"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pwd2" id="text"></td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td><input type="password" name="pwd2" id="text"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="table" value='admin'>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            <td></td>
        </tr>
    </table>
</form>