<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <form method="post" action="" target="back">
        <p class="t botli">管理員登入區</p>
        <p class="cent">帳號 ： <input id="acc" autofocus="" type="text"></p>
        <p class="cent">密碼 ： <input id="pwd" type="password"></p>
        <p class="cent"><input value="送出" type="button" onclick="login()"><input type="reset" value="清除"></p>
    </form>
</div>

<script>
    function login() {
        $.post("./api/login.php", {
            acc: $("#acc").val(),
            pwd: $("#pwd").val()
        }, (res) => {
            if (parseInt(res) == 1) {
                location.href = "./admin.php"
            } else {
                alert("帳號或密碼錯誤")
            }
        })
    }
</script>