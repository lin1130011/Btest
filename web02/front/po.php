<div>
    目前位置：首頁 > 分類網誌 > <span id='nav'>健康新知</span>
</div>

<div style="display:flex;">
    <fieldset style="width: 150px;">
        <legend>分類網誌</legend>
        <a class="type" data-type="1" style="display:block;margin:5px;">健康新知</a>
        <a class="type" data-type="2" style="display:block;margin:5px;">菸害防治</a>
        <a class="type" data-type="3" style="display:block;margin:5px;">癌症防治</a>
        <a class="type" data-type="4" style="display:block;margin:5px;">慢性病防治</a>
    </fieldset>
    <fieldset style="width: 550px;">
        <legend>文章列表</legend>
        <div id="content"></div>
    </fieldset>
</div>

<script>
    $(".type").on("click", function() {
        $("#nav").text($(this).text())
        getTitle($(this).data('type'))
    })

    function getTitle(type) {
        $.post("./api/get_title.php", {
            type
        }, (res) => {
            console.log(res);
            $("#content").html(res);
        })
    }

    function getnews(id) {
        $.post("./api/get_news.php", {
            id
        }, (news) => {
            $("#content").html(news);
        })
    }
</script>