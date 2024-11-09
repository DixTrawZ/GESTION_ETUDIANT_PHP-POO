<?php
    require_once 'Course.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $credits = $_POST['credits'];
        $teacherId = $_POST['teacherId'];
        $course = new Course($id, $name, $description, $credits, $teacherId);
        $course->saveToFile();
        header("Location: courses.php?success=1");
        exit();
    }
?>
