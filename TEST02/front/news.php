<fieldset>
    <legend>
        目前位置>首頁>最新文章區
    </legend>

    <table class="tab">
        <thead>
            <tr>
                <td width="30%">標題</td>
                <td width="60%">內容</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $news = $News->all();
            foreach ($news as $key => $value) {
            ?>
                <tr>
                    <td class="clo tit"><?= $value['title'] ?></td>
                    <td>
                        <div class="short">
                            <?= mb_substr($value['text'], 0, 30) ?>
                        </div>
                        <div class="all" style="display:none">
                            <?= nl2br($value['text']) ?>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</fieldset>

<script>
    $(".tit").on("click", function() {
        $(this).next().children(".short,.all").toggle();
    })
</script>