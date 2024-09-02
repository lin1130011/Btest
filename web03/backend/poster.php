<style>
    .row {
        background-color: white;
        display: flex;
        align-items: center;
        margin: 2px 0;
    }

    .row>div {
        text-align: center;
        width: 25%;
        color: black;
    }

    .row img {
        height: 80px;
    }
</style>
<form action="./api/edit_poster.php">
    <div style="display: flex;justify-content:space-between;">
        <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">預告片海報</div>
        <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">預告片片名</div>
        <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">預告片排序</div>
        <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">操作</div>
    </div>
    <div style="height:180px;overflow:auto">
        <?php
        $poster = $Poster->all(" order by `rank`");

        foreach ($poster as $key => $value) {
            echo count($poster);
        ?>
            <div class="row">
                <div>
                    <img src="./images/<?= $value['img']; ?>" alt="">
                </div>
                <div>
                    <input type="text" name="name[]" value="<?= $value['name']; ?>">
                </div>
                <div>
                    <button type="button" data-sw='<?= $value['id']; ?>-<?= $prev; ?>' class="sw">往上</button>
                    <button type="button" data-sw='<?= $value['id']; ?>-<?= $next; ?>' class="sw">往下</button>
                </div>
                <div>
                    <input type="checkbox" name="sh[]" value="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? 'checked' : ''; ?>>顯示
                    <input type="checkbox" name="del[]" value="<?= $value['id']; ?>">刪除
                    <select name="ani[]">
                        <option value="1" <?= ($value['mode'] == 1) ? 'selected' : ''; ?>>淡入淡出</option>
                        <option value="2" <?= ($value['mode'] == 2) ? 'selected' : ''; ?>>縮放</option>
                        <option value="3" <?= ($value['mode'] == 3) ? 'selected' : ''; ?>>滑入滑出</option>
                    </select>
                    <input type="hidden" name="id[]" value="<?= $value['id']; ?>">
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>

<hr>

<div>
    <h4 class="ct">新增預告片海報</h4>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    預告片海報: <input type="file" name="img" id="">
                </td>
                <td>
                    預告片片名: <input type="text" name="name" id="">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="提交"></input>
            <input type="reset" value="重置"></input>
        </div>
    </form>
</div>