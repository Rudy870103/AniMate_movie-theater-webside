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
</style>
<div class="container" style="height: 500px;overflow:auto">
    <table class="mt-5 mx-auto text-center">
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
            <tr>
                <td><?=$order['no'];?></td>
                <td><?=$order['movie'];?></td>
                <td><?=$order['date'];?></td>
                <td><?=$order['show_time'];?></td>
                <td><?=$order['tiket'];?></td>
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
    //  刪除按鈕
    $(".del").on("click", function() {
        if (confirm("確定刪除該部電影?")) {
            $.post("./api/del.php", {
                table: 'Movie',
                id: $(this).data('id')
            }, () => {
                location.reload();
            })
        }
    })


    // 顯示按鈕
    $(".show-btn").on("click", function() {
        let id = $(this).data('id');
        $.post("./api/show.php", {
            id
        }, () => {
            location.reload();
        })
    })
</script>