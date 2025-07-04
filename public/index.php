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
    <?php include '../views/header.php'; ?>

    <div class="hero-wrapper">
        <div class="hero"><img src="../assets/img/transparentbigger.png" alt=""></div>
    </div>
    <!-- <div class="triangles-wrapper">
        <div class="triangle tri1"></div>
    </div>  Hidden for clarity -->

    <div class="search-wrapper">

        <form id="searcher" method="get">
            <label id="vehiclelabel" for="vehicle">Vehicles</label>
            <input type="radio" name="type" value="vehicles" id="vehicle">
            <label id="itemslabel" for="items">Items</label>
            <input type="radio" name="type" value="items" id="items" checked>
            <label id="alllabel" for="all">All</label>
            <input type="radio" name="type" value="all" id="all">

            <input type="text" id="search" name="q" placeholder="Type to search" data-search>
        </form>
        <div id="searchdisplaybox"></div>
        <div id="jumphere"></div>
    </div>
    <div class="spacemaker"></div>
    <div id="cooldesign"></div>
    <?php include '../views/footer.php'; ?>
    <!-- <script src="../assets/script/script.js"></script> -->
    <script src="../assets/script/testScript.js"></script>
</body>

</html>