<?php
    require_once 'Registration.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST['id'];
        $dateOfInscription = $_POST['dateOfInscription'];
        $grade = $_POST['grade'];
        $studentId = $_POST['studentId'];
        $courseId = $_POST['courseId'];
        $registration = new Registration($id, $dateOfInscription, $grade, $studentId, $courseId);
        $registration->saveToFile();
        header("Location: registrations.php?success=1");
        exit();
    }
?>
