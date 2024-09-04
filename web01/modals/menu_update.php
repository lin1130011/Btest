<form action="./api/menu_update.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">編輯次選單</h3>
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="table" value="menu">
                    <button type="submit">更新</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>