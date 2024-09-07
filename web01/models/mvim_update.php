<h3 class="cent">更換標題區圖片</h3>
<hr>
<form action="./api/change.php" enctype="multipart/form-data" method="post">
    <table>
        <tr>
            <td>標題區圖片:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="table" value="mvim">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            </td>
            <td>
                <input type="submit" value="更新">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>