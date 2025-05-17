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

<?php 

// Read the JSON file
$json = file_get_contents('./assets/json/weapons_armor.json'); 

// Check if the file was read successfully
if ($json === false) {
    die('Error reading the JSON file');
}

// Decode the JSON file
$json_data = json_decode($json, true); 

// Check if the JSON was decoded successfully
if ($json_data === null) {
    die('Error decoding the JSON file');
}

foreach($json_data as $cur) {
    $name = $cur["name"];
    $type = $cur["type"];
    $hp = $cur["hp"];
    $rarity = $cur["rarity"];
    $sql = "INSERT INTO items (id, Name, Type, HP, Rarity) VALUES ('', '$name', '$type', '$hp', '$rarity')";

    if($conn->query($sql)) {
        echo $name . " " . $type . " " . $hp . " " . $rarity . "<br>";
    }
    else {
        echo "Data not sent!";
    }
}

?>
