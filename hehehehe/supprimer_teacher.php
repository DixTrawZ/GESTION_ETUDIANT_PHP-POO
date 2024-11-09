<?php
    require_once 'Teacher.php';
    if (isset($_POST['id'])) 
    {
        Teacher::deleteFromFile($_POST['id']);
        header("Location: teachers.php?success=2");

    }
?>