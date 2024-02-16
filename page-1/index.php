<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    
    <title>ttg</title>
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lalezar%3A400" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C700" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/ttg.css" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>

<!-- ajax ntuk real time -->
    <script type="text/javascript">

        $(document).ready(function() {
            setInterval(function() {
                $("#data").load('data.php')
            }, 1000);
        });

        $(document).ready(function() {
            setInterval(function() {
                $("#berat").load('berat.php')
            }, 1000);
        });
        
    </script>

    
</head>

<body>


<!-- nav -->
<div class="container-fluid">
    <div class="container">
    <div class="rectangle-1">
        </div>
        <p class="location ">Location</p>
        <p class="unit-storages ">Unit Storages</p>
        <p class="alert ">Alert</p>
        <img class="alarm " src="./assets/alarm.png " />
        <p class="setting ">Setting</p>
        <div class="rectangle-5 ">
        </div>
        <img class="male-user " src="./assets/male-user.png " />
        <p class="nayla-fitia ">Username</p>
        <img class="polygon-2 " src="./assets/polygon-2.png " />

        <div class="rectangle-7 ">
        </div>
        <img class="simtesa-logo-putih " src="./assets/simtesa-logo-putih-1.png " style="height: 26px; width: 100px; ">

        <div class="rectangle-3">
        </div>

        <div class="rectangle-2">
        </div>
        <div class="rectangle-6">
        </div>
        <p class="turn-on">Turn on</p>
    </div>
</div>
<!-- end nav -->

    <div class="container-fluid">
        <div class="container1">

<!-- massa -->
        <div id="berat"></div>     
<!-- end masaa -->

<!-- vol -->
        <div id="data"></div>
<!-- end vol -->

        </div>
    </div>

</body>