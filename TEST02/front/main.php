<style>
    .tag {
        border: 1px solid black;
        border-bottom: none;
        padding: 3px;
    }

    .texts {
        border: 1px solid black;

    }
</style>
<div class="tags" style="display: flex;">
    <div class="tag" data-id=1>健康新知</div>
    <div class="tag" data-id=3>菸害防制</div>
    <div class="tag" data-id=5>癌症防治</div>
    <div class="tag" data-id=7>慢性病防治</div>
</div>

<div class="texts">
    <span id="tt">健康新知</span>
    <pre>
    <div id="text">

    </div>
    </pre>
</div>


<script>
    getnews(1);
    $(".tag").on("click", function() {
        $("#tt").text($(this).text());
        getnews($(this).data('id'));
    })

    function getnews(id) {
        $.post("./api/get_news.php", {
            id
        }, (res) => {
            $("#text").html(res);
        })
    }
</script>