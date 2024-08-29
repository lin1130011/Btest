<fieldset style="width: 60%; margin:auto">
    <legend>會員註冊</legend>
    <span style="color:red;">*請設定您要註冊的帳號及密碼(最多十二個字元)</span>
    <table>
        <tr>
            <td class="clo">Step1:帳號:</td>
            <td>
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">Step2:密碼</td>
            <td>
                <input type="text" name="" id="pwd">
            </td>
        </tr>
        <tr>
            <td class="clo">Step3:確認密碼</td>
            <td>
                <input type="text" name="" id="pwd2">
            </td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱</td>
            <td>
                <input type="text" name="" id="email">
            </td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
            </td>
            <td>
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
            alert("請填寫完整資料不可空白")
        } else {
            if (user.pwd !== user.pwd2) {
                alert("請確認密碼是否一致")
            } else {
                $.post("./api/chk_acc.php", {
                    acc: $("#acc").val()
                }, (chk) => {
                    if (parseInt(chk) == 1) {
                        alert("該帳號已被註冊")
                    } else {
                        $.post("./api/reg.php", user, () => {
                            alert("註冊成功")
                            location.href = './index.php'
                        })
                    }
                })
            }
        }
    }
</script>