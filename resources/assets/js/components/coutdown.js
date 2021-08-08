
// Update the count down every 1 second
var x = setInterval(function() {
    
    // Get today's date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    
    const datelines = document.querySelectorAll('.coutdown')
    datelines.forEach(dateline => {
        var countDownDate = new Date(dateline.dataset.dateline).getTime();
        let distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        dateline.querySelector('.coutdown__day').textContent = days
        dateline.querySelector('.coutdown__hour').textContent = hours
        dateline.querySelector('.coutdown__minute').textContent = minutes
        dateline.querySelector('.coutdown__second').textContent = seconds

        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          dateline.textContent = "EXPIRED";
        }
    })
    
    
}, 1000);