<style>
    @media (max-width: 768px){
        .col-6{
            width: 100%;
        }
    }
</style>
<?php
$news = $News->find($_GET['id']);
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-6 mx-auto text-center">
            <img src="./img/<?= $news['img']; ?>" width="100%">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6 mx-auto">
            <div style="font-size: 20px;font-weight:bold;line-height:150%">
                <?= $news['title']; ?><br><br>
            </div>
            <div style="line-height: 30px;text-wrap:wrap;width:100%">
                <?=nl2br($news['text']);?>
            </div>
        </div>
    </div>
</div>