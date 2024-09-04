<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">新增標題區圖片</h3>
    <table>
        <tr>
            <td>主選單:</td>
            <td>
                <input type="text" name="text" id="">
            </td>
        </tr>
        <tr>
            <td>選單超連結</td>
            <td>
                <input type="text" name="href" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="table" value="menu">
                    <button type="submit">新增</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>