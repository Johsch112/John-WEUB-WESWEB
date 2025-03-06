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

            <?php
            $_ENV = parse_ini_file('../.env');
            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $database = $_ENV['DB_DATABASE'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            $conn = new mysqli($host, $username, $password, $database);

            // if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            // } else {
            //     echo "Connected successfully Connected! Schblagga scblaggha bom bom bom";
            // }
            ?>

            <div class="datawrapper">

                <?php
                $result = mysqli_query($conn, "SELECT * FROM `items`");

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<h3>" . $row['id'] . ". " . $row['Name'] . " " . $row['Type'] . " " . $row['HP'] . " " . $row['Rarity'] . "</h3>" . "<br>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }


                mysqli_close($conn);
                ?>
            </div>


        </div>
    </div>



    <div class="result">

    </div>


    <div class="spacemaker"></div>

    <?php


    ?>

    <?php include '../views/footer.php'; ?>

    <script src="../assets/script/script.js"></script>
</body>

</html>