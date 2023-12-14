//funkcja aktualizuje obecną datę i dodaje ją do elementu o id `data` na stronie
function gettheDate(){
    Todays = new Date();
    TheDate = "" + (Todays.getMonth() + 1) + " / " + Todays.getDate() + " / " + (Todays.getYear() - 100);
    document.getElementById("data").innerHTML = TheDate;
}

var timerID = null;
var timerRunning = false;

//funkcja zatrzymuje zegar na stronie
function stopclock(){
    if (timerRunning){
        clearTimeout(timerID);
    }
    timerRunning = false;
}

//funkcja rozpoczyna działanie funkcjonalności zegara na stronie
function startclock(){
    stopclock();
    gettheDate();
    showtime();
}

//funkcja dodaje zegar na stronę do elementu o id `zegarek`
function showtime(){
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeValue = "" + ((hours > 12) ? hours - 12 : hours);
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    timeValue += (hours >= 12) ? "PM" : "AM";
    document.getElementById("zegarek").innerHTML = timeValue;
    timerID = setTimeout(function(){showtime();}, 1000);
    timerRunning = true;

}