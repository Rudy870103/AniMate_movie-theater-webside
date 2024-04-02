<header style="padding: 50px 0;">
    <h1 style="text-align: center;font-weight:700">新增電影</h1>
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
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>上映時間 : </td>
                <td><input type="date" name="ondate" id="ondate"></td>
            </tr>
            <tr>
                <td>電影類型 : </td>
                <td><input type="text" name="kind" id="kind"></td>
            </tr>
            <tr>
                <td>電影時長(分鐘) : </td>
                <td><input type="text" name="time" id="time"></td>
            </tr>
            <tr>
                <td>電影分級 : </td>
                <td>
                    <select name="level" id="level">
                        <option value="1">普遍級</option>
                        <option value="2">保護級</option>
                        <option value="3">輔導級</option>
                        <option value="4">限制級</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>導演 : </td>
                <td><input type="text" name="director" id="director"></td>
            </tr>
            <tr>
                <td>演員 : </td>
                <td><input type="text" name="actor" id="actor"></td>
            </tr>
            <tr>
                <td>發行商 : </td>
                <td><input type="text" name="company" id="company"></td>
            </tr>
            <tr>
                <td>電影簡介 : </td>
                <td>
                    <textarea name="intro" id="intro" style="width: 100%;height:200px;color:black"></textarea>
                </td>
            </tr>
            <tr>
                <td>預告片 : </td>
                <td><input type="text" name="trailer" id="trailer"></td>
            </tr>
            <tr>
                <td>電影海報 : </td>
                <td><input type="file" name="poster" id="poster"></td>
            </tr>
        </table>
        <div style="width: 50%;margin:auto;text-align:center">
            <input class="login-btn mt-5" style="width:20%;" type="submit" value="新增">
            <input class="login-btn mt-5" style="width:20%;" type="reset" value="重置">
        </div>
    </form>
</div>