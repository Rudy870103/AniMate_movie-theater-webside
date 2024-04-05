<section class="left" style="width:50%">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $newest=$Movie->max('id');
            $first_movie=$Movie->find($newest);
            ?>
            <div class="carousel-item active">
                <img src="./img/<?=$first_movie['poster'];?>" class="d-block" style="height: 60vh;margin:auto">
                <p class="p-3" style="color:white;text-align:center;line-height:40px">
                    <span style="font-size: 20px;font-weight:bold"><?=$first_movie['name'];?></span><br>
                    上映日期: <?=$first_movie['ondate'];?><br>
                    分級: <img src="./img/level<?=$first_movie['level'];?>.png" width="50px"><br>
                </p>
            </div>
            <?php
            $movies=$Movie->q("select * from `movie` where id<$newest && sh=1 order by ondate desc");
            foreach($movies as $movie){
            ?>
            <div class="carousel-item">
                <img src="./img/<?=$movie['poster'];?>" class="d-block" style="height: 60vh;margin:auto">
                <p class="p-3" style="color:white;text-align:center;line-height:40px">
                    <span style="font-size: 20px;font-weight:bold"><?=$movie['name'];?></span><br>
                    上映日期: <?=$movie['ondate'];?><br>
                    分級: <img src="./img/level<?=$movie['level'];?>.png" width="50px"><br>
                </p>
            </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>