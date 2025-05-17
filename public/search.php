<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$_ENV = parse_ini_file('../.env');
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$database = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$myArray = [];

if ($_GET['type'] == 'vehicles') {
    $q = $_GET['q'] ?? '';
    $result = mysqli_query($conn, "SELECT * FROM vehicles WHERE Manufuacturer LIKE '%" . $conn->real_escape_string($q) . "%'");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
    }
    echo json_encode($myArray);
    exit;
}

if ($_GET['type'] == 'items') {
    $q = $_GET['q'] ?? '';
    $result = mysqli_query($conn, "SELECT * FROM items WHERE Name LIKE '%" . $conn->real_escape_string($q) . "%'");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
    }
    echo json_encode($myArray);
    exit;
}

    if ($_GET['type'] == 'all') {
    $q = $_GET['q'] ?? '';
    $result = mysqli_query($conn, "SELECT * FROM items WHERE Name LIKE '%" . $conn->real_escape_string($q) . "%'");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
    }

    $result2 = mysqli_query($conn, "SELECT * FROM vehicles WHERE Manufuacturer LIKE '%" . $conn->real_escape_string($q) . "%'");
    if ($result2) {
        while ($row = $result2->fetch_assoc()) {
            $myArray[] = $row;
        }
    }
    echo json_encode($myArray);
    exit;
}


echo json_encode(["error" => "No valid query parameters (vehicles/items) set."]);



// if (isset($_GET['vehicles'])) {
//     $q = $_GET['q'];
//     $result = mysqli_query($conn, "SELECT * FROM vehicles WHERE Manufuacturer LIKE '%" . $q . "%'");
// } 
// else {
//     $result = mysqli_query($conn, "SELECT * FROM `vehicles`");
// }


// if (isset($_GET['items'])) {
//     $q = $_GET['q'];
//     $result = mysqli_query($conn, "SELECT * FROM items WHERE Name LIKE '%" . $q . "%'");
// } else {
//     $result = mysqli_query($conn, "SELECT * FROM `items`");
// }

// $myArray = [];
// if ($result) {
//     while ($row = $result->fetch_assoc()) {
//         $myArray[] = $row;
//     }
//     echo json_encode($myArray);
// } else {
//     echo "Error: " . mysqli_error($conn);
// }
$conn->close();
?>
        
