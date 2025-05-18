<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find anything.</title>
    <link rel="stylesheet" href="../public/main.css">
    <link rel="icon" type="image/png" href="../assets/img/smalllogo.png">
</head>

<body>
    <?php
    // $_ENV = parse_ini_file('../.env');
    // $host = $_ENV['DB_HOST'];
    // $port = $_ENV['DB_PORT'];
    // $database = $_ENV['DB_DATABASE'];
    // $username = $_ENV['DB_USERNAME'];
    // $password = $_ENV['DB_PASSWORD'];

    // $conn = new mysqli($host, $username, $password, $database);
    ?>
    <?php include '../views/header.php'; ?>

    <div class="hero-wrapper">
        <div class="hero"><img src="../assets/img/transparentbigger.png" alt=""></div>
        <!-- <h1>Find anything.</h1> -->
    </div>




    <!-- <div class="triangles-wrapper">
        <div class="triangle tri1"></div>
    </div>  Hidden for clarity -->

    <div class="search-wrapper">

        <form id="searcher" method="get">
            <input type="text" id="search" name="q" placeholder="Type to search" data-search>
            <label id="vehiclelabel" for="vehicle">Vehicles</label>
            <input type="radio" name="type" value="vehicles" id="vehicle">
            <label id="itemslabel" for="items">Items</label>
            <input type="radio" name="type" value="items" id="items" checked>
            <label id="alllabel" for="all">All</label>
            <input type="radio" name="type" value="all" id="all">


        </form>
        <div id="searchdisplaybox"></div>
    </div>
    <div class="spacemaker"></div>
    <div id="cooldesign"></div>
    <?php include '../views/footer.php'; ?>
    <!-- <script src="../assets/script/script.js"></script> -->
    <script src="../assets/script/testScript.js"></script>
</body>

</html>