<div id="main" style="display: flex;">
    <section class="left" style="width:50%">
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

    <style>
        .right {
            width: 50%;
            height: 100px;
            background-color: #5483B3;
        }

        select,
        option {
            color: black;
        }

        .col {
            color: black
        }
    </style>
    <section class="right p-2">
        <div class="container" style="display: flex;justify-content:space-between">
            <div>
                快速訂票
            </div>
            <div id="select">
                <div class="row">
                    <div class="col">
                        電影 : <select name="movie" id="movie">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        日期 : <select name="date" id="date">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        場次 : <select name="session" id="session">

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="login-btn" type="button" value="前往購票" onclick="booking()">
                </div>
            </div>
        </div>


    </section>

</div>

<div id="booking" style="display: none;">
    <button onclick="$('#select,#booking').toggle()">上一步</button>
    <button>訂購</button>
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

    function getSessions(movie, date) {
        $.get("./api/get_sessions.php", {
            movie,
            date
        }, (sessions) => {
            $("#session").html(sessions);
        })
    }

    function booking() {
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
    }
</script>