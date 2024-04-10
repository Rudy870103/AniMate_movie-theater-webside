<style>
    select, option{
        color: black;
    }
    .container{
        display: flex;
        justify-content: center;
        gap: 50px;
    }
    .poster{
        width: 30%;
    }
</style>
<div class="container">
    <div id="select">
        <div class="row">
            <div class="col">
                電影 : <select name="movie" id="movie">
            
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    日期 : <select name="date" id="date">
                
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    場次 : <select name="session" id="session">
                
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mt-3">
                <input class="login-btn" type="button" value="前往購票" onclick="booking()">
            </div>
        </div>
    </div>
    <div class="poster">
        <?php
        if($_GET['id']){
            $movie=$Movie->find($_GET['id']);
        ?>
        <img src="./img/<?=$movie['poster'];?>" width="100%">
        <?php } ?>
    </div>
</div>


<div id="booking" style="display: none;">
    <button onclick="$('#select,#booking').toggle()">上一步</button>
    <button>訂購</button>
</div>

<script>
    
    let url=new URL(window.location.href)

getMovies();

$("#movie").on("change",function(){
    getDates($("#movie").val())
})

$("#date").on("change",function(){
    getSessions($("#movie").val(),$("#date").val())
})

function getMovies(){
    $.get("./api/get_movies.php",(movies)=>{
        $("#movie").html(movies);
        if(url.searchParams.has('id')){
           $(`#movie option[value='${url.searchParams.get('id')}']`).prop('selected',true);
        }
        getDates($("#movie").val())
    })
}
function getDates(id){
    $.get("./api/get_dates.php",{id},(dates)=>{
            $("#date").html(dates);
            let movie=$("#movie").val()
            let date=$("#date").val()
            getSessions(movie,date)
    })
}
function getSessions(movie,date){
    $.get("./api/get_sessions.php",{movie,date},(sessions)=>{
            $("#session").html(sessions);
    })
}

function booking(){
    let order={movie_id:$("#movie").val(),
               date:$("#date").val(),
               session:$("#session").val()}
    $.get("./api/booking.php",order,(booking)=>{
        $("#booking").html(booking)
        $('#select').hide();
        $(".poster").hide();
        $('#booking').show()
    })
}

</script>
