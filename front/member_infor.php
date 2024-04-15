<header style="padding: 20px 0;">
    <h3 style="text-align: center;font-weight:700;">會員專區<span style="display: block;font-size:16px;margin-top:10px">Member</span></h3>
</header>
<style>
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        background-color: #295aa3;
    }
    @media (max-width: 768px){
        .col-3{
            width: 80%;
        }
    }
</style>

<div style="width: 80%;margin:auto;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="member-info" data-bs-toggle="tab" data-bs-target="#memberInfo" type="button" role="tab" aria-controls="memberInfo" aria-selected="true">會員資料</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="member-order" data-bs-toggle="tab" data-bs-target="#memberOrder" type="button" role="tab" aria-controls="memberOrder" aria-selected="false">購票紀錄</button>
        </li>
    </ul>
    <div class="tab-content mt-5" id="myTabContent">
        <!-- 會員資料 -->
        <div class="tab-pane fade show active" id="memberInfo" role="tabpanel" aria-labelledby="member-info">
            <div>
                <style>
                    .reg {
                        width: 30%;
                        margin: auto;
                        text-align: center;
                    }

                    input {
                        width: 100%;
                        text-align: center;
                    }
                </style>
                <?php $mem = $Member->find(['acc' => $_SESSION['member']]);  ?>
                <div class="col-3 p-4" style="text-align: start;background-color: #5483B3;margin:auto">
                    <div>帳號 : <?= $mem['acc']; ?></div>
                    <div>密碼 : <?= $mem['pw']; ?></div>
                    <div>信箱 : <?= $mem['email']; ?></div>
                </div>
            </div>
        </div>
        <!-- 購票紀錄 -->
        <div class="tab-pane fade" id="memberOrder" role="tabpanel" aria-labelledby="member-order">

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
                @media (max-width: 768px){
                    table{
                        width: 500px;
                    }
                }
            </style>
            <div class="container" style="height: 500px;overflow:auto">
                <table id="orderList" class="mt-5 mx-auto text-center">
                    <tr>
                        <th>訂單編號</th>
                        <th>電影名稱</th>
                        <th>日期</th>
                        <th>場次時間</th>
                        <th>訂購數量</th>
                        <th>訂購位置</th>
                    </tr>
                    <?php
                    $orders = $Orders->all(['acc'=>$_SESSION['member']]," order by `id` desc");
                    foreach ($orders as $order) {
                    ?>
                        <tr id="order_list">
                            <td><?= $order['no']; ?></td>
                            <td><?= $order['movie']; ?></td>
                            <td><?= $order['date']; ?></td>
                            <td><?= $order['show_time']; ?></td>
                            <td><?= $order['ticket']; ?></td>
                            <td>
                                <?php
                                $seats = unserialize($order['seat']);
                                foreach ($seats as $seat) {
                                    echo $seat;
                                    echo "|";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>