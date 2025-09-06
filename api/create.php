<?php
require 'db_config.php';

$name   = $_POST['s_name'];
$enr    = $_POST['s_entrollment'];
$course = $_POST['s_course'];
$city   = $_POST['s_city'];
$state  = $_POST['s_state'];

$stmt = $mysqli->prepare("INSERT INTO students (s_name, s_entrollment, s_course, s_city, s_state) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $enr, $course, $city, $state);
$stmt->execute();

echo json_encode(["id" => $stmt->insert_id, "status" => "created"]);
