<?php
$movie=$Movie->find($_GET['id']);
?>
<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700">編輯電影</h1>
</header>
<div>
    <style>
        tr{
            height: 40px;
        }
        input{
            width: 100%;
            height: 30px;
            text-align: center;
        }
        select, option{
            color: black;
        }
    </style>
    <form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
        <table style="width: 50%;margin:auto">
            <tr>
                <td >電影名稱 : </td>
                <td><input type="text" name="name" value="<?=$movie['name'];?>"></td>
            </tr>
            <tr>
                <td>上映時間 : </td>
                <td><input type="date" name="ondate" value="<?=$movie['ondate'];?>"></td>
            </tr>
            <tr>
                <td>電影類型 : </td>
                <td><input type="text" name="kind" value="<?=$movie['kind'];?>"></td>
            </tr>
            <tr>
                <td>電影時長(分鐘) : </td>
                <td><input type="text" name="time" value="<?=$movie['time'];?>"></td>
            </tr>
            <tr>
                <td>電影分級 : </td>
                <td>
                    <select name="level" id="level">
                        <option value="1" <?=($movie['level']==1)?'selected':'';?>>普遍級</option>
                        <option value="2" <?=($movie['level']==2)?'selected':'';?>>保護級</option>
                        <option value="3" <?=($movie['level']==3)?'selected':'';?>>輔12級</option>
                        <option value="4" <?=($movie['level']==4)?'selected':'';?>>輔15級</option>
                        <option value="5" <?=($movie['level']==5)?'selected':'';?>>限制級</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>導演 : </td>
                <td><input type="text" name="director" value="<?=$movie['director'];?>"></td>
            </tr>
            <tr>
                <td>演員 : </td>
                <td><input type="text" name="actor" value="<?=$movie['actor'];?>"></td>
            </tr>
            <tr>
                <td>發行商 : </td>
                <td><input type="text" name="company" value="<?=$movie['company'];?>"></td>
            </tr>
            <tr>
                <td>電影簡介 : </td>
                <td>
                    <textarea name="intro" id="intro" style="width: 100%;height:200px;color:black"><?=$movie['intro'];?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>預告片 : </td>
                <td><input type="text" name="trailer" value="<?=htmlspecialchars($movie['trailer']);?>"></td>
            </tr>
            <tr>
                <td>電影海報 : </td>
                <td><input type="file" name="poster" id="poster"></td>
            </tr>
        </table>
        <div style="width: 50%;margin:auto;text-align:center">
            <input type="hidden" name="id" value="<?=$movie['id'];?>">
            <input class="login-btn mt-5" style="width:20%;" type="submit" value="更新">
            <input class="login-btn mt-5" style="width:20%;" type="reset" value="重置">
        </div>
    </form>
</div>