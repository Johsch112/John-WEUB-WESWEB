<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/main.css">
</head>

<body>
   
<?php include '../views/header.php'; ?>

    <div class="hero-wrapper">
        <div class="hero"><img src="../assets/img/finderlogo.PNG" alt=""></div>
        <h1>Find anything.</h1>
    </div>

    <div class="spacemaker"></div>

    <div class="search-wrapper">
        <div class="searchbox">
            <input type="radio" name="search" id="search1" checked>
            <label for="search1">Search by Category</label>
            <input type="radio" name="search" id="search2" checked>
            <label for="search1">Search by Category</label>

            <input type="text" placeholder="Search for anything">
            <button>Search for this</button>

            <button>Search for that</button>

        </div>
    </div>



    <div class="result">

    </div>


    <div class="spacemaker"></div>

    <?php include '../views/footer.php'; ?>

</body>

</html>