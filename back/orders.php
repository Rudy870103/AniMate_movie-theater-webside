<header style="padding: 20px 0;">
    <h3 style="text-align: center;font-weight:700;">訂票管理<span style="display: block;font-size:16px;margin-top:10px">Orders</span></h3>
</header>

<style>
    table {
        width: 80%;
    }

    td {
        border: 1px solid white;
        padding: 10px 5px;
    }

    th{
        border: 1px solid white;
        background-color: rgb(100,100,100);
    }

    tr {
        border: 1px solid white;
    }
    select, option{
        color: black;
    }
</style>
<div class="text-center">
    <input type="radio" name="type" value="date" checked>依日期
    <input type="date" name="date" id="date">
    <input type="radio" name="type" value="movie">依電影
    <select name="movie" id="movie">
        <?php
        $movies=$Orders->q("select `movie` from `orders` Group by `movie`");
        foreach($movies as $movie){
            echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
        }
        ?>
    </select>
    <button class="login-btn" onclick="gdel()">刪除</button>
</div>
<div class="container" style="height: 500px;overflow:auto">
    <table id="orderList" class="mt-5 mx-auto text-center">
        <tr>
            <th>訂單編號</th>
            <th>電影名稱</th>
            <th>日期</th>
            <th>場次時間</th>
            <th>訂購數量</th>
            <th>訂購位置</th>
            <th>操作</th>
        </tr>
        <?php
        $orders = $Orders->all();
        foreach ($orders as $order) {
        ?>
            <tr id="order_list">
                <td><?=$order['no'];?></td>
                <td><?=$order['movie'];?></td>
                <td><?=$order['date'];?></td>
                <td><?=$order['show_time'];?></td>
                <td><?=$order['ticket'];?></td>
                <td>
                <?php
                $seats=unserialize($order['seat']);
                foreach($seats as $seat){
                    echo $seat;
                    echo "|";
                }
                ?>
                </td>
                <td>
                    <button class="login-btn" onclick="del(<?=$order['id'];?>)">刪除</button>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>

    $("input[name='type'], #date, #movie").on('change', function() {
        filterOrders();
    });

    function del(id){
        if(confirm("確定刪除該筆訂單?")){
        $.post("./api/del.php",{table:'Orders',id},()=>{
            location.reload();
            })
        }
    }

    function gdel(){
        let type=$("input[name='type']:checked").val();

        let val=$("#"+type).val();

        let chk=confirm(`是否刪除${type}為${val}的所有資料?`)

        if(chk){
            $.post("./api/gdel.php",{type,val},()=>{
                location.reload();
            })
        }
    }

    function filterOrders(){
        let type=$("input[name='type']:checked").val();
        let value=$("#" + type).val();

        $.ajax({
            url:"./api/filter_orders.php",
            method:"POST",
            data: {type: type,value: value},
            success: function(res){
                $("#orderList").html(res);
            }
        })
    }
</script>