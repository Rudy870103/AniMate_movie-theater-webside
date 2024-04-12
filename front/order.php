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
<div id="main" class="container">
    <div id="select">
        <div class="row pt-2">
            <div class="col">
                電影 : <select name="movie" id="movie">
            
                </select>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col">
                <div>
                    日期 : <select name="date" id="date">
                
                    </select>
                </div>
            </div>
        </div>
        <div class="row pt-2">
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



// 宣告一格變數，用來判斷是否還有場次
let hasSession=true;

function getSessions(movie, date) {
    $.get("./api/get_sessions.php", {
        movie,
        date
    }, (sessions) => {
        if(sessions.length>0){
            $("#session").html(sessions);
            hasSession=true;
        }else{
            let none="<option>目前尚無場次<option>";
            $("#session").html(none);
            hasSession=false;
        }
        
    })
}

// 判斷是否有登入
let memberLogin=<?=(isset($_SESSION['member']))?'true':'false';?>;

function booking() {
    if(memberLogin){
        if(hasSession){
            let movie_id=$("#movie").val();
            let date=$("#date").val();
            let session=$("#session").val();
            
            if(movie_id && date && session){
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
            }else{
                alert("請選擇電影、日期及場次");
            }
        }else{
            alert("目前尚無場次");
        }
    }else{
        alert("請先登入");
        location.href='?do=member';
    }
}
</script>
