<?php
require 'db_config.php';

$id    = $_POST['id'];
$name  = $_POST['s_name'];
$enr   = $_POST['s_entrollment'];
$course= $_POST['s_course'];
$city  = $_POST['s_city'];
$state = $_POST['s_state'];

$stmt = $mysqli->prepare("UPDATE students SET s_name=?, s_entrollment=?, s_course=?, s_city=?, s_state=? WHERE id=?");
$stmt->bind_param("sssssi", $name, $enr, $course, $city, $state, $id);
$stmt->execute();

echo json_encode(["id" => $id]);
