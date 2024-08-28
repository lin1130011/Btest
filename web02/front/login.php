<fieldset style="width:60%;margin:20px auto">
    <legend>會員登入</legend>
    <table>
        <tr>
            <td class="">帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="">密碼</td>
            <td>
                <input type="password" name="pwd" id="pwd">
            </td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button>清除</button>
            </td>
            <td>
                <a href="?do=forget">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login() {
        let acc = $("#acc").val();
        let pwd = $("#pwd").val();
        $.post("./api/chk_acc.php", {
            acc
        }, (chk) => {
            if (parseInt(chk) == 1) {
                $.post("./api/chk_pw.php", {
                    acc,
                    pwd
                }, (chk_pwd) => {
                    if (parseInt(chk_pwd) == 1) {
                        if (acc == "admin") {
                            location.href = './admin.php'
                        } else {
                            location.href = "./index.php"
                        }
                    } else {
                        alert("密碼錯誤")
                    }
                })
            } else {
                alert("查無帳號")
            }
        })
    }
</script>