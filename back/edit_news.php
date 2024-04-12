<?php
$news=$News->find($_GET['id']);
?>
<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700">編輯情報</h1>
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
    <form action="./api/save_news.php" method="post" enctype="multipart/form-data">
        <table style="width: 50%;margin:auto">
            <tr>
                <td >電影名稱 : </td>
                <td><input type="text" name="title" value="<?=$news['title'];?>"></td>
            </tr>
            <tr>
                <td>電影簡介 : </td>
                <td>
                    <textarea name="text" id="text" style="width: 100%;height:200px;color:black"><?=$news['text'];?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>圖片 : </td>
                <td><input type="file" name="img" id="img"></td>
            </tr>
        </table>
        <div style="width: 50%;margin:auto;text-align:center">
            <input type="hidden" name="id" value="<?=$news['id'];?>">
            <input class="login-btn mt-5" style="width:20%;" type="submit" value="更新">
            <input class="login-btn mt-5" style="width:20%;" type="reset" value="重置">
        </div>
    </form>
</div>