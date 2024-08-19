<fieldset style="width:60%;margin:20px auto">
    <legend>會員註冊</legend>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pwd" id="pwd"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pwd" id="pwd2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="pwd" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clear()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pwd: $("#pwd").val(),
            pwd2: $("#pwd2").val(),
            email: $("#email").val()
        }
        if (user.acc == '' || user.pwd == '' || user.pwd2 == '' || user.email == '') {
            alert("不可輸入空白")
        } else {
            if (user.pwd !== user.pwd2) {
                alert("兩次輸入密碼不一致")
            } else {
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (chk_acc) => {
                    if (parseInt(chk_acc) == 1) {
                        alert("該帳號存在")
                    } else {
                        $.post("./api/reg.php",
                            user, (res) => {
                                console.log(res);

                                alert("註冊成功")
                            })
                    }
                })
            }
        }

    }
</script>