<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="cent">新增最新消息資料</h3>
    <table>
        <tr>
            <td>最新消息資料:</td>
            <td>
                <textarea name="text" id=""></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <input type="hidden" name="table" value="news">
                    <button type="submit">新增</button>
                    <button type="reset">重置</button>
                </div>
            </td>
        </tr>
    </table>
</form>