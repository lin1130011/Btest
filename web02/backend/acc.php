<fieldset>
    <legend>帳號管理</legend>
    <table class="tab ct">
        <tr>
            <td class='clo'>帳號</td>
            <td class='clo'>密碼</td>
            <td class='clo'>刪除</td>
        </tr>
        <?php
        $User = new DB('users');
        $users = $User->all();
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= $user['acc']; ?></td>
                <td><?= str_repeat("*", strlen($user['pwd'])); ?></td>
                <td><input type="checkbox" name="del" value="<?= $user['id']; ?>"></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <button onclick="del()">確定刪除</button>
        <button onclick="clean()">清空選取</button>
    </div>


    <h2>新增會員</h2>

    <!-- div+table>tr*5>td.clo+td>input:text -->
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pwd"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pwd2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clean()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>

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

        function del() {
            let chks = $("input[type='checkbox']:checked")
            let ids = new Array()
            if (chks.length > 0) {
                for (let i = 0; i < chks.length; i++) {
                    ids.push(chks[i].value)
                }
                $.post("./api/del_user.php", {
                    ids
                }, (res) => {
                    // console.log(res);

                    location.reload();
                })
            } else {
                alert("沒有東西要刪除")
            }

        }
    </script>
</fieldset>