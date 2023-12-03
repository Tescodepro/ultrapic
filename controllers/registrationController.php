<?php
include("database.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateNextApplicationId($prefix, $lastId)
{
    // Extract the numeric part of the last ID
    $lastIdNumeric = (int) substr($lastId, strlen($prefix));

    // Increment the numeric part
    $nextIdNumeric = $lastIdNumeric + 1;

    // Combine the prefix and the incremented numeric part
    $nextApplicationId = $prefix . str_pad($nextIdNumeric, strlen($lastId) - strlen($prefix), '0', STR_PAD_LEFT);

    return $nextApplicationId;
}


if (isset($_POST["enrol"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $middle_name = $_POST["middle_name"];
    $matric_no = $_POST["matric_no"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $register_courses_id = (int) $_POST["register_courses_id"];
    $department_id = (int) $_POST["department_id"];
    $level = (int) $_POST["level"];

    $last_id = "SELECT MAX(id) AS last_id FROM students";

    $result = $dbconnect->query($last_id);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row['last_id'];
        // Generate the next application ID
        // Start from the next ID
        $nextIdNumeric = $lastId + 1;

        // Generate the next application ID and check for uniqueness
        do {
            $nextApplicationId = generateNextApplicationId('UL/APP/', $nextIdNumeric);
            $checkQuery = "SELECT id FROM students WHERE id = '$nextApplicationId'";
            $checkResult = $dbconnect->query($checkQuery);

            if ($checkResult->num_rows == 0) {
                // ID is unique, break the loop
                break;
            }
            // ID already exists, try the next one
            $nextIdNumeric++;
        } while (true);
    }

    // Check if the values already exist in the database
    $checkDuplicateQuery = "SELECT * FROM students WHERE matric_no = '$matric_no' OR phone = '$phone' OR email = '$email'";
    $duplicateResult = mysqli_query($dbconnect, $checkDuplicateQuery);

    if (mysqli_num_rows($duplicateResult) > 0) {
        $duplicateData = mysqli_fetch_assoc($duplicateResult);
        $duplicateMatricNo = $duplicateData['matric_no'] == $matric_no ? 'Matriculation Number' : '';
        $duplicatePhone = $duplicateData['phone'] == $phone ? 'Phone' : '';
        $duplicateEmail = $duplicateData['email'] == $email ? 'Email' : '';

        $msg = "Duplicate entry found for $duplicateMatricNo $duplicatePhone $duplicateEmail.";
        header("Location:../training.php?type=error&msg=$msg");
    } else {

        $sql = $dbconnect->prepare("INSERT INTO students (application_id, first_name, last_name, middle_name, matric_no, phone, email, register_courses_id, department_id, level)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $sql->bind_param("sssssssiii", $nextApplicationId, $first_name, $last_name, $middle_name, $matric_no, $phone, $email, $register_courses_id, $department_id, $level);

        // Function to load the content of the email template
        function loadEmailTemplate($templatePath, $placeholders)
        {
            $content = file_get_contents($templatePath);

            foreach ($placeholders as $placeholder => $value) {
                $content = str_replace("{{$placeholder}}", $value, $content);
            }

            return $content;
        }
        // send mail
        // Include the PHPMailer autoload file
        require '../vendor/autoload.php';

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);



        try {

            $templatePath = 'mail_tem.html';
            $placeholders = [
                'USERNAME' => $first_name . ' ' . $last_name . ' ' . $middle_name,
                'APPLICATION_ID' => $nextApplicationId,
            ];


            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tescodepro@gmail.com';
            $mail->Password = 'tmlkcqowomgsaqnt';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('info@ultrapic.com', 'Ultrapic Solution');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Registration Successful';
            $mail->Body = loadEmailTemplate($templatePath, $placeholders);
            ;

            // Send the email
            if ($mail->send()) {
                // Execute the statement
                if ($sql->execute()) {
                    $msg = "Registered successfully";
                    header("Location:../training.php?type=success&msg=$msg");
                } else {
                    $msg = "Something when wrong";
                    header("Location:../training.php?type=success&msg=$msg");
                }
            } else {
                $msg = "Something went wrong in sending your Application ID";
                header("Location:../training.php?type=success&msg=$msg");
            }

        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }



    }

}