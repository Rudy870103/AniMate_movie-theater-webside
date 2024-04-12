<header style="padding: 20px 0;">
    <h3 style="text-align: center;font-weight:700;">電影情報管理<span style="display: block;font-size:16px;margin-top:10px">News</span></h3>
</header>
<div class="mx-auto" style="text-align: center;">
    <button class="login-btn" style="width: 100px;height:50px;" onclick="location.href='?do=add_news'">新增情報</button>
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
    $news = $News->all(" order by id desc");
    foreach ($news as $new) {
    ?>
        <tr>
            <td>
                <img src="./img/<?= $new['img']; ?>" style="width: 200px;">
            </td>
            <td style="width:70%;vertical-align: top;">
                <p style="font-size: 20px;font-weight:bold;"><?= $new['title']; ?></p>
            </td>
            <td>
                <button class="login-btn" onclick="location.href='?do=edit_news&id=<?=$new['id'];?>'">編輯</button>
                <button class="login-btn del" data-id='<?=$new['id'];?>'>刪除</button>
            </td>
        </tr>
    <?php } ?>
</table>

<script>
//  刪除按鈕
$(".del").on("click",function(){
    if(confirm("確定刪除該情報?")){
        $.post("./api/del.php",{table:'News',id:$(this).data('id')},()=>{
            location.reload();
        })
    }
})


</script>