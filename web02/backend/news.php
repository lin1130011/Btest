<fieldset>
    <legend>最新文章管理</legend>
    <form action="" method="post">
        <table class="tab">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>標題</th>
                    <th>顯示</th>
                    <th>刪除</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $News = new DB('news');

                $news = $News->all();

                $total = $News->count();
                $div = 3;
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                ?>
                <?php
                foreach ($news as $key => $value): ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['title'] ?></td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1) ? 'checked' : '' ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $value['id'] ?>">
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
</fieldset>