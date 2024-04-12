<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700">新增情報</h1>
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
                <td >標題 : </td>
                <td><input type="text" name="title" id="title"></td>
            </tr>
            <tr>
                <td>內容 : </td>
                <td>
                    <textarea name="text" id="text" style="width: 100%;height:200px;color:black"></textarea>
                </td>
            </tr>
            <tr>
                <td>圖片 : </td>
                <td><input type="file" name="img" id="img"></td>
            </tr>
        </table>
        <div style="width: 50%;margin:auto;text-align:center">
            <input class="login-btn mt-5" style="width:20%;" type="submit" value="新增">
            <input class="login-btn mt-5" style="width:20%;" type="reset" value="重置">
        </div>
    </form>
</div>