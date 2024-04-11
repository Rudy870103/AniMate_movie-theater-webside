<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700;">現正熱映<span style="display: block;font-size:16px;margin-top:10px">Hot Now</span></h1>
</header>
<div style="display: flex;flex-wrap:wrap;margin:auto;justify-content:start;gap:2.6%">
    <?php
    $movies = $Movie->all(['sh' => 1]);
    foreach ($movies as $movie) {
    ?>
        <div class="card mb-5" style="width: 23%;background-color:gray;">
            <div style="height: 28rem;overflow:hidden">
                <img src="./img/<?= $movie['poster']; ?>" class="card-img-top" style="width:100%;">
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="card-text">
                    <h5 class="card-title d-flex justify-content-between">
                        <p style="text-shadow: 1px 1px black;font-weight:bold"><?=$movie['name'];?></p>
                        <img src="./img/level<?= $movie['level']; ?>.png" style="width: 40px;">
                    </h5>
                    <p>上映日期 : <?= $movie['ondate']; ?></p>
                    <p>片長 : <?= $movie['time']; ?></p>
                    <p>類型 : <?= $movie['kind']; ?></p>
                    <p>演員 : <?= mb_substr($movie['actor'],0,20); ?>...</p>
                </div>
                <div>
                    <a href="?do=intro&id=<?= $movie['id']; ?>" class="login-btn p-2" style="text-decoration:none;">詳細資訊</a>
                </div>
            </div>
            
           
        </div>
    <?php } ?>
</div>