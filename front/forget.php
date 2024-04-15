<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700">忘記密碼<span style="display: block;font-size:16px;margin-top:10px">Forget</span></h1>
</header>
<div>
    <style>
        .forget {
            width: 30%;
            margin: auto;
            text-align: center;
        }
        input{
            width: 100%;
            text-align: center;
        }
        @media(max-width:768px){
            .forget{
                width: 80%;
            }
        }
    </style>
    <div class="forget mb-5">
        請輸入註冊信箱
        <input type="text" name="email" id="email"><br><br>

        <div class="result" style="color:yellow"></div><br><br>
        <div>
            <button class="login-btn" onclick="forget()">確定</button>
            <button class="login-btn" onclick="clean()">重置</button>
        </div>
    </div>
</div>


<script>
    function forget(){
        $.post("./api/forget.php",{email:$("#email").val()},(res)=>{
            $(".result").text(res);
        })
    }
</script>