<?php include_once "db.php";

$orders = $Orders->all([$_POST['type'] => $_POST['value']]);


foreach ($orders as $order) {
    echo "<tr id='order_list'>";
    echo  "<td>" . $order['no'] . "</td>";
    echo  "<td>" . $order['movie'] . "</td>";
    echo  "<td>" . $order['date'] . "</td>";
    echo  "<td>" . $order['show_time'] . "</td>";
    echo  "<td>" . $order['ticket'] . "</td>";
    echo  "<td>";
    $seats = unserialize($order['seat']);
    foreach ($seats as $seat) {
        echo $seat;
        echo "|";
    };
    echo  "</td>";
    echo  "<td>";
    echo  "<button class='login-btn' onclick='del({$order['id']})'>刪除</button>";
    echo  "</td>";
    echo "</tr>";
}
