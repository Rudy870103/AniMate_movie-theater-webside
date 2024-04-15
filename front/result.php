<?php
$order=$Orders->find(['no'=>$_GET['no']]);
?>
<style>
    @media(max-width:768px){
        .col-6{
            width: 100%;
        }
    }
</style>
<div class="container">
    <div class="row mt-3">
        <div class="col-6 mx-auto">
            <div class="text-center" style="font-size: 20px;font-weight:bold">
                訂購完成，您的訂單編號 : <span style="color: yellow;"><?=$order['no'];?></span>
            </div>
            <div class="mt-5" style="line-height: 30px;">
                電影名稱 : <?=$order['movie'];?><br>
                日期 : <?=$order['date'];?><br>
                場次時間 : <?=$order['show_time'];?><br>
                座位 : 
                <?php
                $seats=unserialize($order['seat']);
                foreach($seats as $seat){
                    echo $seat;
                    echo "、";
                }
                echo "共{$order['ticket']}張";
                ?>
            </div>
            <div class="text-center mt-3">
                <button class="login-btn" onclick="location.href='index.php'">確認</button>
            </div>
        </div>
    </div>
</div>