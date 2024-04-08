<div id="room">
    <!--建立一個容器來存放所有的座位-->
    <div class="seats">
        <div class="screen" style="width: 500px;height: 30px;background-color: #ccc;text-align:center;margin:auto">
            <span style="text-align: center;color:black">螢幕舞台</span>
        </div>


        <div class="seat mt-3" style="margin: auto;text-align:center;margin:top;">
            <style>
                input[type=checkbox] {
                    display: none;
                }

                input[type=checkbox]+span {
                    display: inline-block;
                    text-align: center;
                    width: 30px;
                    height: 20px;
                    cursor: pointer;
                    margin: 5px;
                    background-color: #ccc;
                    color: black
                }

                input[type=checkbox]:checked+span {
                    background-color: yellow;
                }
            </style>

            <?php
            for ($i = 1; $i <= 5; $i++) {
            ?>
                <div class='seat mx-5'>
                    <?php
                    $letter = chr(64 + $i);
                    echo "<div class='mx-5' style='display:inline-block'>$letter</div>";
                    for ($j = 1; $j <= 4; $j++) {
                    ?>
                        <!-- 建立一個座位的容器 -->
                        <!-- //座位勾選欄位 -->
                        <label>
                            <input type='checkbox' name='chk' value='<?= $i; ?>' class='chk'>
                            <span><?= $j; ?></span>
                        </label>
                    <?php
                    }
                    echo "<div class='mx-5' style='display:inline-block'>$letter</div>";
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="info">
    <div>您選擇的電影是：</div>
    <div>您選擇的時刻是：</div>
    <div>您已經勾選<span id='tickets'>0</span>張票，最多可以購買四張票</div>
    <div>
        <!--使用jquery來切換顯示區塊-->
        <button class="login-btn" onclick="$('#select').show();$('#booking').hide()">上一步</button>
        <button class="login-btn" onclick="checkout()">訂購</button>
    </div>
</div>