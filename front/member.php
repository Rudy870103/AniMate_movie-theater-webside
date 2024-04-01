<header style="padding: 80px 0;">
    <h1 style="text-align: center;font-weight:700;">會員登入<span style="display: block;font-size:16px;margin-top:10px">Login</span></h1>
</header>
<div>
    <table style="margin: auto;padding: 80px 0;">
        <tr>
            <td class="text-end">帳號 : &nbsp</td>
            <td><input type="text" name="acc" id="acc" style="background-color:#f8f8f8 !important;border:1px solid #1f1f1f"></td>
        </tr>
        <tr>
            <td class="text-end">密碼 : &nbsp</td>
            <td><input type="password" name="pw" id="pw" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center">
                <br>
                <input class="login-btn" type="button" value="登入" onclick="login()">
                <input class="login-btn" type="reset" value="清除" onclick="clean()">
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center">
                <br>
                <a href="?do=forget" class="forget">忘記密碼</a> | <a href="?do=reg" class="forget">尚未註冊</a>
            </td>
        </tr>
    </table>
</div>

<script>
    /**
     * 登入函式
     */
    function login() {
        // 取得帳號輸入框的值
        let acc = $("#acc").val()
        // 取得密碼輸入框的值
        let pw = $("#pw").val()
        // 發送 POST 請求到 chk_acc.php 檢查帳號是否存在
        $.post('./api/chk_acc.php', {
            acc
        }, (res) => {
            // 如果回傳的結果為 0，表示查無帳號
            if (parseInt(res) == 0) {
                alert("查無帳號")
            } else {
                // 發送 POST 請求到 chk_pw.php 檢查帳號密碼是否正確
                $.post('./api/chk_pw.php', {
                    acc,
                    pw
                }, (res) => {
                    // 如果回傳的結果為 1，表示密碼正確
                    if (parseInt(res) == 1) {
                        // 如果帳號為 'admin'，導向後台頁面
                        if ($("#acc").val() == 'admin') {
                            location.href = 'index.php'
                            alert('管理者登入成功');
                        } else {
                            // 否則導向首頁
                            location.href = 'index.php';
                            alert('登入成功');

                        }
                    } else {
                        alert("密碼錯誤")
                    }
                })
            }
        })
    }
</script>