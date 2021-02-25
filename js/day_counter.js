let timer_show = document.getElementById("timer");

function diffSubtract(date1, date2) {
    return date2 - date1;
}

let end_date = {
    "full_year": "2021",
    "month": "02",
    "day": "21",
    "hours": "23",
    "minutes": "10",
    "seconds": "00"
}

let end_date_str = `${end_date.full_year}-${end_date.month}-${end_date.day} ${end_date.hours}:${end_date.minutes}:${end_date.seconds}`

timer = setInterval(function () {
    let now = new Date();
    let date = new Date(end_date_str);
    let ms_left = diffSubtract(now, date);
    if (ms_left <= 0) {
        clearInterval(timer);
        timer_show.innerHTML = 'to the ' + end_date_str + ' no time left ';
    } else {
        let res = new Date(ms_left);
        let str_timer = `${res.getUTCFullYear() - 1970} years ${res.getUTCMonth()} months ${res.getUTCDate() - 1} days ${res.getUTCHours()}:${res.getUTCMinutes()}:${res.getUTCSeconds()}`;
        timer_show.innerHTML = 'to the ' + end_date_str + '     left ' + str_timer;
    }
})