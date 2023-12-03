<?php
include "database.php";

$getDepartment = "SELECT * FROM departments";
$getDepartmentQuery = mysqli_query($dbconnect, $getDepartment);


$getCourse = "SELECT * FROM courses";
$getCourseQuery = mysqli_query($dbconnect, $getCourse);