<?php
    require_once 'Course.php'; 
    
    if (isset($_POST['id'])) 
    {
        $idToUpdate = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $credits = $_POST['credits'] ?? '';
        $teacherId = $_POST['teacherId'] ?? '';
        Course::updateInFile($idToUpdate, $name, $description, $credits, $teacherId);
        header("Location: courses.php?success=3");
        exit();
    }
?>
