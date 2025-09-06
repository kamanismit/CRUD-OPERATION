<?php
require 'db_config.php';

$perPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;

// Get total count
$res = $mysqli->query("SELECT COUNT(*) AS cnt FROM students");
$total = $res->fetch_assoc()['cnt'];
$pages = ceil($total / $perPage);

// Get records
$stmt = $mysqli->prepare("SELECT * FROM students ORDER BY id DESC LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $perPage, $offset);
$stmt->execute();
$result = $stmt->get_result();

$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode(["students" => $students, "pages" => $pages]);
