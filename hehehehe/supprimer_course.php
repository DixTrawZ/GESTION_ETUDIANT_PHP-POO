<?php
    require_once 'Course.php';
    if (isset($_POST['id'])) 
    {
        $id = $_POST['id'];
        Course::deleteFromFile($id);
        header("Location: courses.php?success=2");
        exit();
    }
?>
