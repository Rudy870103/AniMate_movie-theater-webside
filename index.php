<?php include_once "./api/db.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-1.9.1min.js"></script>
    <script src="./js/js.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>AniMate-Theater</title>
</head>
<style>
    nav {
        z-index: 999;
    }
</style>

<body>
    <div class="container-fluid" style="padding: 0;">
        <!-- navbar -->
        <aside>
            <nav class="navbar navbar-expand-lg nav-bg p-3 navbar-dark">
                <a class="navbar-brand" href="index.php" style="display:inline-block">
                    <img src="./img/logo.png" style="width:70px">Animate
                </a>
                <button class="navbar-toggler" data-bs-theme="dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="border-color:white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <style>
                        .nav-item {
                            margin: auto;
                        }
                    </style>
                    <ul class="navbar-nav" style="width:100%;text-align:center;margin:auto">
                        <li class="nav-item" style="width: 20%;">
                            <a class="nav-link" href="index.php">首頁</a>
                        </li>
                        <li class="nav-item" style="width: 20%;">
                            <a class="nav-link" href="?do=movie_list">現正熱映</a>
                        </li>
                        <li class="nav-item" style="width: 20%;">
                            <?php
                            if (isset($_SESSION['member']) && $_SESSION['member'] != 'admin') { ?>
                                <a class="nav-link" href="?do=member_infor">會員專區</a>
                            <?php } else { ?>
                                <a class="nav-link" href="?do=member">會員登入</a>
                            <?php } ?>
                        </li>
                        <li class="nav-item" style="width: 20%;">
                            <a class="nav-link" href="?do=news">電影情報</a>
                        </li>
                        <li class="nav-item" style="width: 20%;">
                            <a class="nav-link" href="?do=contact">聯絡我們</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>


        <!-- 網頁內容 -->
        <main class="p-5">
            <?php
            $do = $_GET['do'] ?? 'main';
            $file = "./front/{$do}.php";

            if (file_exists($file)) {
                include $file;
            } else {
                include "./front/main.php";
            }
            ?>


        </main>

            <style>
                @media (max-width: 768px){
                    footer .container{
                        font-size: 12px;
                        overflow: hidden;
                    }
                }
            </style>


        <footer>
            <div class="container text-center pt-5">
                0917893235 | favoriteinfinite@gmail.com | © AniMate All rights reserved.
                <a href="https://www.instagram.com/rudy_chenboru/" target="_blank">
                    <i class="fa-brands fa-square-instagram" style="color: #74C0FC;font-size:30px;"></i>
                </a>
            </div>
        </footer>
    </div>
</body>

</html>