<?php
    require_once 'Student.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST['id'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $registrationList = isset($_POST['registrationList']) ? array_map('trim', explode(",", $_POST['registrationList'])) : [];
        $student = new Student($id, $lastName, $firstName, $dateOfBirth, $registrationList);
        $student->saveToFile();
        header("Location: students.php?success=1");
        exit();
    }
?>
