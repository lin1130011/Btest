<h3 class="cent">新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>管理者帳號:</td>
            <td>
                <input type="text" name="acc" id="">
            </td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td>
                <input type="password" name="pwd" id="">
            </td>
        </tr>
        <tr>
            <td>確認密碼:</td>
            <td>
                <input type="password" name="pwd2" id="">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="table" value="admin">
            </td>
            <td>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>