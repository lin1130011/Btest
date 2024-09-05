<h3 class="cent">更換標題區圖片</h3>
<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <input type="hidden" name="table" value="title">
            </td>
            <td>
                <input type="submit" value="更新">
                <input type="reset" value="重置">
            </td>

        </tr>
    </table>
</form>