//ajax ntuk real time
$(document).ready(function() {
    setInterval(function() {
        $("#data").load('data.php')
    }, 1000);
}); <