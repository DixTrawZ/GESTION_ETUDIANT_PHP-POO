<?php
    require_once 'Teacher.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST['id'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $specialty = $_POST['specialty'];
        $courseList = isset($_POST['courseList']) ? array_map('trim', explode(",", $_POST['courseList'])) : [];
        $teacher = new Teacher($id, $lastName, $firstName, $specialty, $courseList);
        $teacher->saveToFile();
        header("Location: teachers.php?success=1");
        exit();
    }
?>
