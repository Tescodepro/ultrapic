<?php
session_start();
include '../../controllers/database.php';

if (isset($_POST['edit_add'])) {
    $course = $_POST['course'];
    $course_id = $_POST['id'];
    $redirect = $_POST['redirect'];

    if (!empty($course_id)) {
        // Update the course information
        $update_query = "UPDATE courses SET course_name = '$course' WHERE course_id = $course_id";
        $result = mysqli_query($dbconnect, $update_query);
        if ($result) {
            header("Location: ../$redirect?type=success&msg=Course updated successfully");
        } else {
            header("Location: ../$redirect?type=error&msg=Error updating course:". mysqli_error($dbconnect)."");
        }
    } else {
        // Insert a new course
        $insert_query = "INSERT INTO courses (course_name) VALUES ('$course')";
        $result = mysqli_query($dbconnect, $insert_query);
        if ($result) {
            header("Location: ../$redirect?type=success&msg=Course added successfully");
        } else {
            header("Location: ../$redirect?type=error&msg=Error adding course:". mysqli_error($dbconnect)."");
        }
    }
}

if (isset($_POST['delete'])) {
    $course_id = $_POST['id'];
    $redirect = $_POST['redirect'];
    $table = $_POST['table'];
    if($table == 'courses') {
        $id = 'course_id';
    }else{
        $id = 'department_id';
    }

    $delete_query = "DELETE FROM $table WHERE $id = $course_id";
    $result = mysqli_query($dbconnect, $delete_query);

    if ($result) {
        header("Location: ../$redirect?type=success&msg=Delete item successfully");
    } else {
        header("Location: ../$redirect?type=error&msg=Error deleting item:". mysqli_error($dbconnect)."");
    }
}

if (isset($_POST['edit_add_department'])) {
    $department = $_POST['department'];
    $department_id = $_POST['id'];
    $redirect = $_POST['redirect'];

    if (!empty($department_id)) {
        // Update the course information
        $update_query = "UPDATE departments SET department_name = '$department' WHERE department_id = $department_id";
        $result = mysqli_query($dbconnect, $update_query);
        if ($result) {
            header("Location: ../$redirect?type=success&msg=department updated successfully");
        } else {
            header("Location: ../$redirect?type=error&msg=Error updating department:". mysqli_error($dbconnect)."");
        }
    } else {
        // Insert a new department
        $insert_query = "INSERT INTO departments (department_name) VALUES ('$department')";
        $result = mysqli_query($dbconnect, $insert_query);
        if ($result) {
            header("Location: ../$redirect?type=success&msg=department added successfully");
        } else {
            header("Location: ../$redirect?type=error&msg=Error adding department:". mysqli_error($dbconnect)."");
        }
    }
}