<?php
require_once 'Student.php';

if (isset($_POST['id'])) 
{
    $idToUpdate = $_POST['id'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $dateOfBirth = $_POST['dateOfBirth'] ?? '';
    $registrationList = $_POST['registrationList'] ?? ''; // On peut le conserver sous forme de chaîne

    // Convertir la chaîne en tableau si nécessaire (si vous l'avez stocké sous forme de chaîne)
    $registrationListArray = explode(',', $registrationList); // Assurez-vous que les valeurs sont séparées par des virgules

    // Appeler la méthode pour mettre à jour les données de l'étudiant dans le fichier
    Student::updateInFile($idToUpdate, $lastName, $firstName, $dateOfBirth, $registrationListArray);

    // Rediriger vers la page d'affichage des étudiants avec un message de succès
    header("Location: students.php?success=3");
    exit();
}
?>
