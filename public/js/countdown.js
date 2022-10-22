const countdown = document.getElementById("countdown");

const dateStart = new Date(countdown.dataset.datestart).getTime();
const dateEnd = new Date(countdown.dataset.dateend).getTime();

const format2Digits = (num) => {
    return num.toString().padStart(2, "0");
};

// Update the count down every 1 second
var x = setInterval(function () {
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = now < dateStart ? dateStart - now : dateEnd - now;

    // Time calculations for days, hours, minutes and seconds
    var days, hours, minutes, seconds;

    if (now > dateEnd) {
        days = 0;
        hours = 0;
        minutes = 0;
        seconds = 0;
    } else {
        days = Math.floor(distance / (1000 * 60 * 60 * 24));
        hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        seconds = Math.floor((distance % (1000 * 60)) / 1000);
    }

    // Output the result in an element with id="demo"
    document.getElementById("days").innerHTML = format2Digits(days);
    document.getElementById("hours").innerHTML = format2Digits(hours);
    document.getElementById("minutes").innerHTML = format2Digits(minutes);
    document.getElementById("seconds").innerHTML = format2Digits(seconds);

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
