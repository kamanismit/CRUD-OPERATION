<?php
require 'db_config.php';

$page      = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit     = 5;
$offset    = ($page - 1) * $limit;

$totalRes  = $mysqli->query("SELECT COUNT(*) as cnt FROM students")->fetch_assoc();
$total     = $totalRes['cnt'];
$pages     = ceil($total / $limit);

$result    = $mysqli->query("SELECT * FROM students ORDER BY id DESC LIMIT $offset, $limit");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode([
    "students" => $data,
    "total"    => $total,
    "pages"    => $pages,
    "page"     => $page
]);
