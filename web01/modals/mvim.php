<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">新增動畫圖片</h3>
    <table>
        <tr>
            <td>動畫圖片:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="table" value="mvim">
                    <button type="submit">新增</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>