<fieldset style="width: 60%; margin:20px auto; ">
    <legend>會員註冊</legend>

    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td>
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td>
                <input type="text" name="" id="pwd">
            </td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td>
                <input type="text" name="" id="pwd2">
            </td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="text" name="" id="email">
            </td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button>清除</button>
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
            email: $("#email").val(),
        }
        if (user.acc == '' || user.pwd == '' || user.pwd2 == '' || user.email == '') {
            alert("不可空白")
        } else {
            if (user.pwd !== user.pwd2) {
                alert("請確認好密碼")
            } else {
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (chk) => {
                    if (parseInt(chk) == 1) {
                        alert("帳號已被註冊")
                    } else {
                        $.post("./api/reg.php", user, () => {
                            alert("註冊成功")
                            location.href = '?do=login'
                        })
                    }
                })
            }
        }
    }
</script>