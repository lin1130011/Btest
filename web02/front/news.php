<div>
    目前位置：首頁 > 最新文章區
</div>
<table class="tab">
    <thead>
        <tr>
            <td style="width: 40%;">標題</td>
            <td style="width: 50%;">內容</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = $News->all();

        foreach ($data as $key => $value) {
        ?>
            <tr>
                <td class="clo title">
                    <?= $value['title'] ?>
                </td>
                <td class="short">
                    <?= mb_substr($value['text'], 0, 30) ?>
                </td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>