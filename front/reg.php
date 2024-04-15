<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700">會員註冊<span style="display: block;font-size:16px;margin-top:10px">Join us</span></h1>
</header>
<div>
    <style>
        .reg {
            width: 30%;
            margin: auto;
            text-align: center;
        }
        input{
            width: 100%;
            text-align: center;
        }
        @media(max-width:768px){
            .reg{
                width: 80%;
            }
        }
    </style>
    <div class="reg">
        <div>帳號</div>
        <input type="text" name="acc" id="acc"><br><br>
        <div>密碼</div>
        <input type="password" name="pw" id="pw"><br><br>
        <div>確認密碼</div>
        <input type="password" name="pw2" id="pw2"><br><br>
        <div>信箱</div>
        <input type="text" name="email" id="email"><br><br>
        <div>
            <button class="login-btn" onclick="reg()">註冊</button>
            <button class="login-btn" onclick="clean()">重置</button>
        </div>
    </div>
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
                            location.href = '?do=member';
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