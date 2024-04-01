<header style="padding: 80px 0;">
<h1 style="text-align: center;font-weight:700">會員註冊<span style="display: block;font-size:16px;margin-top:10px">Join us</span></h1>
</header>
<div>
    <style>
        table{
            margin: auto;
            padding: 80px 0;
        }
        
    </style>
<table>
        <tr>
            <td style="text-align:end;width:70%;"><input type="text" name="acc" id="acc"></td>
            <td class="clo">帳號</td>
        </tr>
        <tr>
            <td style="text-align:end;width:70%;"><input type="password" name="pw" id="pw"></td>
            <td class="clo">密碼</td>
        </tr>
        <tr>
            <td style="text-align:end;width:70%;"><input type="password" name="pw2" id="pw2"></td>
            <td class="clo">確認密碼</td>
        </tr>
        <tr>
            <td style="text-align:end;width:70%;"><input type="text" name="email" id="email"></td>
            <td class="clo">信箱(忘記密碼時使用)</td>
        </tr>
        <tr>
            <td class="text-end">
                <br>
                <input class="login-btn" type="button" value="註冊" onclick="reg()">
                <input class="login-btn" type="reset" value="清除" onclick="clean()">
            </td>
            <td></td>
        </tr>
    </table>
</div>


<script>
    function reg() {
        // 取得使用者輸入的帳號、密碼、確認密碼和電子郵件
        let user = {
            acc: $("#acc").val(), // 帳號
            pw: $("#pw").val(), // 密碼
            pw2: $("#pw2").val(), // 確認密碼
            email: $("#email").val() // 電子郵件
        }

        // 檢查使用者輸入是否完整
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            // 檢查密碼和確認密碼是否相符
            if (user.pw == user.pw2) {
                // 發送 POST 請求檢查帳號是否重覆
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    // 如果回傳的結果為 1，表示帳號重覆
                    if (parseInt(res) == 1) {
                        alert("帳號重覆")
                    } else {
                        // 發送 POST 請求進行註冊
                        $.post('./api/reg.php', user, (res) => {
                            alert('註冊完成，請重新登入')
                            location.href='?do=member';
                        })
                    }
                })
            } else {
                alert("密碼錯誤")
            }
        } else {
            alert("不可空白")
        }
    }
</script>