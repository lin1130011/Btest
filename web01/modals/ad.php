<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">新增動態文字廣告</h3>
    <table>
        <tr>
            <td>動態文字廣告:</td>
            <td>
                <input type="text" name="text" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="table" value="ad">
                    <button type="submit">新增</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>