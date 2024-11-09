<?php
    require_once 'Student.php';
    if (isset($_POST['id'])) 
    {
        Student::deleteFromFile($_POST['id']);
        header("Location: Students.php?success=2");
    }
?>