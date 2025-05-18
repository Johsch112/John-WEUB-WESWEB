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
  echo "<h2>" . "Connected" . "</h2>";
}
?>

<?php 

// Read the JSON file
$json = file_get_contents('./assets/json/spaceships.json'); 

if ($json === false) {
    die('Error reading the JSON file');
}

$json_data = json_decode($json, true); 

if ($json_data === null) {
    die('Error decoding the JSON file');
}

foreach($json_data as $cur) {
    $manu = $cur["manufacturer"];
    $model = $cur["model"];
    $hp = $cur["hp"];
    $rarity = $cur["rarity"];
    $sql = "INSERT INTO vehicles (id, Manufuacturer, Model, HP, Rarity) VALUES ('', '$manu', '$model', '$hp', '$rarity')";

    if($conn->query($sql)) {
        echo $manu . " " . $model . " " . $hp . " " . $rarity . "<br>";
    }
    else {
        echo "Data not sent!";
    }
}

?>
