<header style="padding: 20px 0;">
    <h3 style="text-align: center;font-weight:700;">會員管理<span style="display: block;font-size:16px;margin-top:10px">Member</span></h3>
</header>

<style>
    table {
        width: 80%;
    }

    td {
        border: 1px solid white;
        padding: 10px 5px;
    }

    th {
        border: 1px solid white;
        background-color: rgb(100, 100, 100);
    }

    tr {
        border: 1px solid white;
    }

    select,
    option {
        color: black;
    }
</style>

<div class="container" style="height: 500px;overflow:auto">
    <table id="orderList" class="mt-5 mx-auto text-center">
        <tr>
            <th>帳號</th>
            <th>密碼</th>
            <th>信箱</th>
            <th>操作</th>
        </tr>
        <?php
        $mems = $Member->all("order by `id` desc");
        foreach ($mems as $mem) {
        ?>
            <tr id="order_list">
                <td><?= $mem['acc']; ?></td>
                <td><?= $mem['pw']; ?></td>
                <td><?= $mem['email']; ?></td>
                <td>
                    <?php
                    if ($mem['acc'] == 'admin') {
                        echo "此帳號為最高權限";
                    } else {
                    ?>
                        <button class="login-btn" onclick="del(<?= $mem['id']; ?>)">刪除</button>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
    function del(id) {
        if (confirm("確定刪除該帳號?")) {
            $.post("./api/del.php", {
                table: 'Member',
                id
            }, () => {
                location.reload();
            })
        }
    }
</script>