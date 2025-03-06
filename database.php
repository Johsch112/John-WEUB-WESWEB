<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/main.css">
</head>
<body>
    

<img src="assets/img/Editor.PNG" alt="" style="border-radius: 20px;">
<br>

<?php
$_ENV = parse_ini_file('.env');
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$database = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "<h2>" . "Connected successfully! Schblagga scblaggha bom bom bom" . "</h2>";
}
?>

<form action="sendItem.php" method="POST">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="type" placeholder="Type">
    <input type="text" name="hp" placeholder="HP">
    <input type="text" name="rarity" placeholder="Rarity">
    <button type="submit">Send data</button>
</form>
<br>
<form action="sendVehicle.php" method="POST">
<input type="text" name="manufacturer" placeholder="Manufacturer">
    <input type="text" name="model" placeholder="Model">
    <input type="text" name="hp" placeholder="HP">
    <input type="text" name="rarity" placeholder="Rarity">
    <button type="submit">Send data</button>
</form>

<br>

<div class="datawrapper"> 

<?php echo "<h1>" . "Give your juicy data to the me, the dark lord" . "</h1>";
echo "<br>";
$result = mysqli_query($conn, "SELECT * FROM `items`");

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<h3>". $row['id'] . " " . $row['Name'] . " " . $row['Type'] . " " . $row['HP'] . " " . $row['Rarity'] . "</h3>" . "<br>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
</div>


</body>
</html>
