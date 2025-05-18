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
    //Protection against SQL injections
    $stmt = $conn->prepare("SELECT * FROM vehicles WHERE Manufuacturer LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
    }
    echo json_encode($myArray);
    exit;
}
//-----------------------------------------------------------------------
if ($_GET['type'] == 'items') {
    $q = $_GET['q'] ?? '';
    //Protection against SQL injections
    $stmt = $conn->prepare("SELECT * FROM items WHERE Name LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
    }
    echo json_encode($myArray);
    exit;
}
//-----------------------------------------------------------------------
if ($_GET['type'] == 'all') {
    $q = $_GET['q'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM items WHERE Name LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
    }

    $stmt = $conn->prepare("SELECT * FROM vehicles WHERE Manufuacturer LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $result2 = $stmt->get_result();
    if ($result2) {
        while ($row = $result2->fetch_assoc()) {
            $myArray[] = $row;
        }
    }
    echo json_encode($myArray);
    exit;
}

echo json_encode(["error" => "No valid query parameters (vehicles/items) set."]);

$conn->close();
?>