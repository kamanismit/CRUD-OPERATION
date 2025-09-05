<?php
require 'db_config.php';

$id = $_POST['id'];

$stmt = $mysqli->prepare("DELETE FROM students WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["id" => $id]);
