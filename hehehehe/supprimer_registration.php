<?php
    require_once 'Registration.php';
    if (isset($_POST['id'])) 
    {
        Registration::deleteFromFile($_POST['id']);
        header("Location: Registrations.php?success=2");
    }
?>