<?php 
$db_server = "localhost";
$db_username = "John";
$db_password = "Banan";
$db_name = "universalfinder";
$conn = "";

$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if ($conn) {
    echo "Connected! Schblagga scblaggha bom bom bom";
}
else {
    echo "Not connected!". mysqli_connect_error();
}


$name = $_POST['name'];
$type = $_POST['type'];
$hp = $_POST['hp'];
$rarity = $_POST['rarity'];

$sql = "INSERT INTO items (id, name, type, hp, rarity) VALUES ('', '$name', '$type', '$hp', '$rarity')";

if($conn->query($sql)) {
    echo $name . " " . $type . " " . $hp . " " . $rarity;
}
else {
    echo "Data not sent!";
}


?>