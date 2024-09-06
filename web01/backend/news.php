<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>

                </tr>
                <?php
                $db = ${ucfirst($do)};
                $div = 5;
                $total = $db->count();
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                $data = $db->all(" limit $start,$div");

                foreach ($data as $key => $value) : ?>
                    <tr class="cent">
                        <td width="80%">
                            <textarea name="text[]" id="" style="width: 98%;height:45px;"><?= $value['text'] ?></textarea>

                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" id="" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $value['id'] ?>">
                            <input type="hidden" name="id[]" id="" value="<?= $value['id'] ?>">
                            <input type="hidden" name="table" id="" value="<?= $do ?>">
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="cent">
            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='./admin.php?do=$do&p=$prev'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                if ($now == $i) {
                    $size = "24px";
                } else {
                    $size = "18px";
                }
                echo "<a style='font-size:$size' href='./admin.php?do=$do&p=$i'> $i </a>";
            }

            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='./admin.php?do=$do&p=$next'> > </a>";
            }
            ?>

        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','./models/<?= $do ?>.php')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>