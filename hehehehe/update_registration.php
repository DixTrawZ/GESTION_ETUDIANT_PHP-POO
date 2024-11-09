<?php
    require_once 'Registration.php';
    if (isset($_POST['id'])) 
    {
        $idToUpdate = $_POST['id'] ?? '';
        $dateOfInscription = $_POST['dateOfInscription'] ?? '';
        $grade = $_POST['grade'] ?? '';
        $studentId = $_POST['studentId'] ?? '';
        $courseId = $_POST['courseId'] ?? '';
        Registration::updateInFile($idToUpdate, $dateOfInscription, $grade, $studentId, $courseId);
        header("Location: registrations.php?success=3");
        exit();
    }
?>
