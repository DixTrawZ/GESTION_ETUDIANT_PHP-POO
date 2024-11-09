<?php
    require_once 'Student.php';
    if (isset($_GET['success'])) 
    {
        if ($_GET['success'] == 1)
        {
            echo "<p style='color: green;'>L'élève a été ajouté avec succès !</p>";
        }
        if ($_GET['success'] == 2)
        {
            echo "<p style='color: green;'>L'élève a été supprimé avec succès !</p>";
        }
        if ($_GET['success'] == 3)
        {
            echo "<p style='color: green;'>Modification réussie !</p>";
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
        <script src="update_student.js"></script>
		<title> Students </title>
		<meta charset="UTF-8"/>
	</head>
	<body>
        <h1>
		    STUDENTS MANAGEMENT
        </h1>
        <div id="ajout_teacher">
            <h2>
                AJOUTER UN ÉLÈVE
            </h2>
            <form action="ajouter_etudiant.php" method="post">
                <label for="id">L'id de l'élève:</label>
                <input type="text" id="id" name="id" placeholder="L'id de l'élève ici" required>
                <label for="lastName">Le nom de l'élève:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Le nom de l'élève ici" required>
                <label for="firstName">Prénom de l'élève:</label>
                <input type="text" id="firstName" name="firstName" placeholder="Prénom de l'élève ici" required>
                <label for="dateOfBirth">Date de naissance (JJ/MM/AA):</label>
                <input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="Date de naissance ici" required>
                <label for="registrationList">Liste des inscriptions (séparés par des virgules ",") :</label>
                <input type="text" id="registrationList" name="registrationList" placeholder="Liste des inscriptions ici" required>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div id="liste_cours">
            <h2>
                LISTE DES ÉLÈVES
            </h2>
            <table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Inscriptions</th>
            </tr>
            <?php
                Student::displayFromFile();
            ?>
        </table>
        </div>
	</body>
</html>