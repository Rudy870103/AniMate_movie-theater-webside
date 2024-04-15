<style>
    /* Your existing styles here */
    .left {
        width: 50%;
    }

    select,
    option {
        color: black;
    }

    .col {
        color: black
    }

    .booking {
        display: flex;
        justify-content: space-between;
        background-color: #5483B3;
        z-index: 998;
    }

    .news-box {
        border: 5px dotted #5483B3;
        height: 200px;
        overflow: auto;
    }

    .movieparadise {
        height: 250px;
        overflow: hidden;
        background-image: url(./img/movieparadise.jpg);
        background-size: cover;
        background-position: center;
    }

    .movieparadise a {
        display: inline-block;
        width: 100%;
        height: 250px;
    }

    a {
        text-decoration: none;
        color: white;
    }

    @media (max-width: 768px) {

        /* Styles for screens smaller than 768px wide */
        #main {
            flex-direction: column;
        }

        .left {
            margin-top: 200px;
        }

        .left,
        .right {
            width: 100%;
            height: 100%;
        }

        .booking {
            flex-direction: column;
            position: absolute;
            top: 105px;
            width: 75%;
        }

        #select {
            flex-direction: column;
        }

        .booking button {
            margin-top: 10px;
            width: 100%;
        }

        .news-box {
            overflow: auto;
        }

        .news-box .d-flex {
            flex-direction: column;
        }

        .news-box .col {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

<div id="main" style="display: flex;">
    <section class="left">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $newest = $Movie->max('id');
                $first_movie = $Movie->find($newest);
                ?>
                <div class="carousel-item active">
                    <a href="?do=intro&id=<?= $newest; ?>">
                        <img src="./img/<?= $first_movie['poster']; ?>" class="d-block" style="height: 60vh;margin:auto">
                    </a>
                    <p class="p-3" style="color:white;text-align:center;line-height:40px">
                        <span style="font-size: 20px;font-weight:bold"><?= $first_movie['name']; ?></span><br>
                        上映日期: <?= $first_movie['ondate']; ?><br>
                        分級: <img src="./img/level<?= $first_movie['level']; ?>.png" width="50px"><br>
                    </p>
                </div>
                <?php
                $movies = $Movie->q("select * from `movie` where id<$newest && sh=1 order by ondate desc");
                foreach ($movies as $movie) {
                ?>
                    <div class="carousel-item">
                        <a href="?do=intro&id=<?= $movie['id']; ?>">
                            <img src="./img/<?= $movie['poster']; ?>" class="d-block" style="height: 60vh;margin:auto">
                        </a>
                        <p class="p-3" style="color:white;text-align:center;line-height:40px">
                            <span style="font-size: 20px;font-weight:bold"><?= $movie['name']; ?></span><br>
                            上映日期: <?= $movie['ondate']; ?><br>
                            分級: <img src="./img/level<?= $movie['level']; ?>.png" width="50px"><br>
                        </p>
                    </div>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="right p-2">
        <div class="container p-2 booking">
            <div>
                <div class="mb-3" style="font-weight:bold">
                    快速訂票
                </div>
                <div id="select" style="display: flex;">
                    <div class="row pt-1">
                        <div class="col">
                            電影 : <select name="movie" id="movie">

                            </select>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col">
                            日期 : <select name="date" id="date">

                            </select>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col">
                            場次 : <select name="session" id="session">

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="line-height: 30px;">
                    <button class="login-btn p-3" onclick="booking()" style="height: 80px;">
                        <i class="fa-solid fa-ticket fa-2xl" style="color: #74C0FC;font-size:50px"></i><br>
                        <span style="font-size: 14px;">前往購票</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="container my-4 p-2 news-box">
            <div>
                <div class="mb-2" style="font-weight:bold">
                    電影情報
                </div>
                <div id="select" class="d-flex justify-content-around">
                    <div class="pt-1">
                        <?php
                        $news = $News->all(" order by `id` desc limit 4");
                        foreach ($news as $new) {
                        ?>
                            <div class="col mt-2">
                                <a href="?do=news-content&id=<?= $new['id']; ?>">
                                    。<?= mb_substr($new['title'], 0, 18); ?>...
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="pt-1">
                        <?php
                        $news = $News->all(" order by `id` desc limit 4,4");
                        foreach ($news as $new) {
                        ?>
                            <div class="col mt-2">
                                <a href="?do=news-content&id=<?= $new['id']; ?>">
                                    。<?= mb_substr($new['title'], 0, 18); ?>...
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-4 p-2 movieparadise">
            <a href="https://rudy870103.github.io/" target="_blank"></a>
        </div>

    </section>

</div>

<div id="booking" style="display: none;">
</div>

<script>
    let url = new URL(window.location.href)

    getMovies();

    $("#movie").on("change", function() {
        getDates($("#movie").val())
    })

    $("#date").on("change", function() {
        getSessions($("#movie").val(), $("#date").val())
    })

    function getMovies() {
        $.get("./api/get_movies.php", (movies) => {
            $("#movie").html(movies);
            if (url.searchParams.has('id')) {
                $(`#movie option[value='${url.searchParams.get('id')}']`).prop('selected', true);
            }
            getDates($("#movie").val())
        })
    }

    function getDates(id) {
        $.get("./api/get_dates.php", {
            id
        }, (dates) => {
            $("#date").html(dates);
            let movie = $("#movie").val()
            let date = $("#date").val()
            getSessions(movie, date)
        })
    }

    // 宣告一格變數，用來判斷是否還有場次
    let hasSession = true;

    function getSessions(movie, date) {
        $.get("./api/get_sessions.php", {
            movie,
            date
        }, (sessions) => {
            if (sessions.length > 0) {
                $("#session").html(sessions);
                hasSession = true;
            } else {
                let none = "<option>目前尚無場次<option>";
                $("#session").html(none);
                hasSession = false;
            }

        })
    }

    // 判斷是否有登入
    let memberLogin = <?= (isset($_SESSION['member'])) ? 'true' : 'false'; ?>;

    function booking() {
        if (memberLogin) {
            if (hasSession) {
                let movie_id = $("#movie").val();
                let date = $("#date").val();
                let session = $("#session").val();

                if (movie_id && date && session) {
                    let order = {
                        movie_id: $("#movie").val(),
                        date: $("#date").val(),
                        session: $("#session").val()
                    }
                    $.get("./api/booking.php", order, (booking) => {
                        $("#booking").html(booking)
                        $('#main').hide();
                        $('#booking').show()
                    })
                } else {
                    alert("請選擇電影、日期及場次");
                }
            } else {
                alert("目前尚無場次");
            }
        } else {
            alert("請先登入");
            location.href = '?do=member';
        }
    }
</script>