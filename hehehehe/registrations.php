<?php
    require_once 'Registration.php';
    if (isset($_GET['success'])) 
    {
        if ($_GET['success'] == 1)
        {
            echo "<p style='color: green;'>L'inscription a été ajoutée avec succès !</p>";
        }
        if ($_GET['success'] == 2)
        {
            echo "<p style='color: green;'>L'inscription a été supprimée avec succès !</p>";
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
      <script src="update_registration.js"></script>
		<title> Registrations </title>
		<meta charset="UTF-8"/>
	</head>
	<body>
        <h1>
		    REGISTRATIONS MANAGEMENT
        </h1>
        <div id="ajout_teacher">
            <h2>
                AJOUTER UNE INSCRIPTION
            </h2>
            <form action="ajouter_inscription.php" method="post">
                <label for="id">L'id de l'inscription:</label>
                <input type="text" id="id" name="id" placeholder="L'id de l'inscription ici" required>
                <label for="dateOfInscription">Date de l'inscription (JJ/MM/AA):</label>
                <input type="text" id="dateOfInscription" name="dateOfInscription" placeholder="Date de l'inscription ici" required>
                <label for="grade">Note:</label>
                <input type="text" id="grade" name="grade" placeholder="Note ici" required>
                <label for="studentId">Id de l'étudiant:</label>
                <input type="text" id="studentId" name="studentId" placeholder="Id de l'étudiant ici" required>
                <label for="courseId">Id du cours:</label>
                <input type="text" id="courseId" name="courseId" placeholder="Id du cours ici" required>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div id="liste_cours">
            <h2>
                LISTE DES ÉLÈVES
            </h2>
            <table border="1">
                <th>ID</th>
                <th>Date d'Inscription</th>
                <th>Note</th>
                <th>ID de l'Étudiant</th>
                <th>ID du Cours</th>
                <?php Registration::displayFromFile(); ?>
            </table>
        </div>
	</body>
</html>