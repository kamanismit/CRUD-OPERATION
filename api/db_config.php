<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "amity_university"; // <-- your DB name

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    http_response_code(500);
    die(json_encode(["error" => "DB connection failed: " . $mysqli->connect_error]));
}
?>
