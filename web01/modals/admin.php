<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">新增管理者帳號</h3>
    <table>
        <tr>
            <td>帳號:</td>
            <td>
                <input type="text" name="acc" id="">
            </td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td>
                <input type="text" name="pwd" id="">
            </td>
        </tr>
        <tr>
            <td>確認密碼:</td>
            <td>
                <input type="text" name="pwd2" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="table" value="admin">
                    <button type="submit">新增</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>