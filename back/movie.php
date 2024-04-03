<header style="padding: 20px 0;">
    <h3 style="text-align: center;font-weight:700;">院線片管理<span style="display: block;font-size:16px;margin-top:10px">Movie</span></h3>
</header>
<div class="mx-auto" style="text-align: center;">
    <button class="login-btn" style="width: 100px;height:50px;" onclick="location.href='?do=add_movie'">新增電影</button>
</div>
<style>
    table {
        width: 80%;
    }

    td {
        padding: 10px 5px;
    }

    tr {
        border-bottom: 1px solid white;
    }
</style>
<table class="mt-5 mx-auto">
    <?php
    $movies = $Movie->all();
    foreach ($movies as $movie) {
    ?>
        <tr>
            <td>
                <img src="./img/<?= $movie['poster']; ?>" style="width: 200px;">
            </td>
            <td style="width:30%;vertical-align: top;">
                <p style="font-size: 20px;font-weight:bold;"><?= $movie['name']; ?></p>
                <p>上映日期 : <?= $movie['ondate']; ?></p>
                <p>片長 : <?= $movie['time']; ?><br></p>
                <p>分級 : <img src="./img/level<?= $movie['level']; ?>.png" style="width: 40px;"></p>
                <p>類型 : <?= $movie['kind']; ?></p>
                <p>劇情簡介 : <?= mb_substr($movie['intro'], 0, 15); ?>...</p>
            </td>
            <td style="width:25%;vertical-align: top;">
                <p style="font-size: 20px;font-weight:bold;">&nbsp</p>
                <p>導演 : <?= $movie['director']; ?></p>
                <p>演員 : <?= $movie['actor']; ?></p>
                <p>發行商 : <?= $movie['company']; ?></p>
            </td>
            <td>
                <button class="login-btn">顯示</button>
                <button class="login-btn" onclick="location.href='?do=edit_movie&id=<?=$movie['id'];?>'">編輯</button>
                <button class="login-btn">刪除</button>
            </td>
        </tr>
    <?php } ?>
</table>