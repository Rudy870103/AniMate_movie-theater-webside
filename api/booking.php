<?php include_once "db.php";

$movie = $Movie->find($_GET['movie_id']);

$date = $_GET['date'];

$session = $_GET['session'];

$orders = $Orders->all([
    'movie' => $movie['name'],
    'date' => $date,
    'show_time' => $session
]);

// 建立一個空陣列來存放所有訂單的座位資料
$seats = [];

// 將所有訂單的座位資料合併到$seats的陣列中
foreach ($orders as $order) {

    // 將座位資料反序列化後合併到$seats陣列中
    $tmp = unserialize($order['seat']);
    $seats = array_merge($seats, $tmp);
}


?>
<style>
    @media (max-width: 768px){
        #info{
            width: 100%;
        }
    }
</style>
<div class="col-6 mx-auto mb-5" id="info" style="display: flex;justify-content:space-between">
    <div>
        <div>您選擇的電影是：<?= $movie['name']; ?></div>
        <div>您選擇的時刻是：<?= $date; ?> | 場次 : <?= $session; ?></div>
        <div>您已經勾選&nbsp<span id='tickets' style="color: yellow;">0</span>&nbsp張票，最多可以購買4張票</div>
    </div>
    <div>
        <img src="./img/<?=$movie['poster'];?>" width="100px">
    </div>
</div>

<div id="room">
    <!--建立一個容器來存放所有的座位-->
    <div class="seats">
        <div style="display: flex;margin:auto;width: 50%;justify-content:end">
            <div class="box text-center" style="background-color: purple;width:20px;height:20px"></div>
            <span>&nbsp : &nbsp已訂位</span>
        </div>
        <div class="screen" style="width: 50%;height: 30px;background-color: #ccc;text-align:center;margin:auto">
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
            
                <div class='seat mx-4'>
                    <?php
                    $letter = chr(64 + $i);
                    echo "<div class='mx-4' style='display:inline-block'>$letter</div>";
                    for ($j = 1; $j <= 4; $j++) {
                        if (in_array("$letter-$j", $seats)) {
                    ?>
                            <label>
                                <input type='checkbox' name='chk' value='<?= $letter . "-" . $j; ?>' class='chk' checked disabled>
                                <span style="background-color: purple;"><?= $j; ?></span>
                            </label>
                        <?php
                        } else {
                        ?>
                            <!-- 建立一個座位的容器 -->
                            <!-- //座位勾選欄位 -->
                            <label>
                                <input type='checkbox' name='chk' value='<?= $letter . "-" . $j; ?>' class='chk'>
                                <span><?= $j; ?></span>
                            </label>
                    <?php
                        }
                    }
                    echo "<div class='mx-4' style='display:inline-block'>$letter</div>";
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<div class="col-6 mx-auto mt-5">
    <div class="text-center mt-4">
        <button class="login-btn" onclick="clean()">重置</button>
        <button class="login-btn" onclick="checkout()">訂購</button>
    </div>
</div>

<script>
    let seat = new Array();

    $(".chk").on("change", function() {
        if ($(this).prop('checked')) {
            if (seat.length + 1 <= 4) {
                seat.push($(this).val())
            } else {
                $(this).prop('checked', false)
                alert("最多只能勾選4張票");
            }
        } else {
            seat.splice(seat.indexOf($(this).val()), 1)
        }

        $("#tickets").text(seat.length);
    })

    function checkout() {
        if (confirm('請確認訂票資料是否無誤')) {
            $.post("./api/checkout.php", {
                    movie: '<?= $movie['name']; ?>',
                    date: '<?= $date; ?>',
                    show_time: '<?= $session; ?>',
                    ticket: seat.length,
                    seat
                },
                (no) => {
                    location.href = `?do=result&no=${no}`;
                }
            )
        }
    }

    function clean(){
    $("input[type='checkbox']").prop('checked', false);
    seat = []; // 清空座位数组
    $("#tickets").text(0); // 重置座位数显示
}
</script>