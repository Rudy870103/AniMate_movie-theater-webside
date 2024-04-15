<style>
@media (max-width: 768px){
    .trailer{
        width: 100%;
        overflow: auto;
    }
    .intro-img{
        width: 100%;
    }
    .intro-img img{
        width: 100%;
    }
    .intro{
        width: 100%;
    }
}
</style>
<?php
$movie = $Movie->find($_GET['id']);
?>
<div class="container">
    <div class="row">
        <div class="trailer col-6 mx-auto text-center">
            <?= $movie['trailer']; ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="intro-img col-6 mx-auto text-center">
            <img src="./img/<?= $movie['poster']; ?>" width="50%">
        </div>
    </div>
    <div class="row mt-3">
        <div class="intro col-6 mx-auto">
            <div class="text-center" style="font-size: 20px;font-weight:bold">
                <?= $movie['name']; ?>
            </div>
            <div style="line-height: 30px;">
                上映時間 : <?=$movie['ondate'];?><br>
                類型 : <?=$movie['kind'];?><br>
                片長 : <?=$movie['time'];?>分鐘<br>
                分級 : <img src="./img/level<?=$movie['level'];?>.png" width="50px"><br>
                導演 : <?=$movie['director'];?><br>
                演員 : <?=$movie['actor'];?><br>
                發行商 : <?=$movie['company'];?><br>
                <hr>
                <?=$movie['intro'];?>
            </div>
            <div class="text-center mt-3">
                <button class="login-btn" onclick="location.href='?do=order&id=<?=$movie['id'];?>'">前往購票</button>
            </div>
        </div>
    </div>
</div>