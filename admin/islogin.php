<?php
session_start();
include '../controllers/database.php';
// redirect back 
if (!isset($_SESSION['auth_id'])) {
    header("Location: index.php?type=error&msg=You have no access to this page please kindly login.");
} else {
    $user_id = $_SESSION['auth_id'];
    // get info from database
    $get_user = $dbconnect->prepare("SELECT * FROM users WHERE id = ?");
    $get_user->bind_param("s", $user_id);
    $get_user->execute();
    $result = $get_user->get_result();
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    // $phone = $row['phone'];
}

// Statistic of students
$student_details = "SELECT * FROM students ";
$student_details = mysqli_query($dbconnect, $student_details);
$total_students = 0;
while ($row = mysqli_fetch_array($student_details)) {
    $total_students++;
}

$query = "SELECT COUNT(course_id) as course_count FROM courses";
$result = mysqli_query($dbconnect, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $number_courses = $row['course_count'];
} else {
    $number_courses = 0;
}