<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">新增標題區圖片</h3>
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td>標題區替代文字</td>
            <td>
                <input type="text" name="text" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="table" value="title">
                    <button type="submit">新增</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>