<?php
include 'islogin.php';

// if (isset($_POST['submit'])) {
    $count = 1;
    $get_students = "SELECT * FROM students INNER JOIN courses ON courses.course_id = students.register_courses_id INNER JOIN departments ON departments.department_id = students.department_id";
    $result_row = mysqli_query($dbconnect, $get_students);

    // Set headers to force download
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="students_data.xls"');
    header('Cache-Control: max-age=0');

    // Output the Excel header
    echo "S/N\tApplication Number\tMatric No\tFullname\tEmail\tPhone\tLevel\tCourse\tDepartment\n";

    while ($fetch = mysqli_fetch_array($result_row)) {
        $application_id = $fetch['application_id'];
        $matric_no = $fetch['matric_no'];
        $email = $fetch['email'];
        $phone = $fetch['phone'];
        $level = $fetch['level'];
        $course = $fetch['course_name'];
        $department = $fetch['department_name'];
        $name = $fetch['first_name'] . ' ' . $fetch['middle_name'] . ' ' . $fetch['last_name'];

        // Output each row of the data
        echo "$count\t$application_id\t$matric_no\t$name\t$email\t$phone\t$level\t$course\t$department\n";

        $count++;
    }

    exit;
// }
?>
