<?php
    require_once 'Teacher.php';
    if (isset($_POST['id'])) 
    {
        $idToUpdate = $_POST['id'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $firstName = $_POST['firstName'] ?? '';
        $specialty = $_POST['specialty'] ?? '';
        $courseList = $_POST['courseList'] ?? '';   
        Teacher::updateInFile($_POST['id'], $lastName, $firstName, $specialty, $courseList);
        header("Location: teachers.php?success=3");
        exit();
    }
?>
