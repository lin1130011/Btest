<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">更新校園映像圖片</h3>
    <table>
        <tr>
            <td>校園映像圖片:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="table" value="image">
                    <button type="submit">更新</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>