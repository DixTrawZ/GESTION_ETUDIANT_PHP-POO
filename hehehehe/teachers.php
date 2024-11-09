<?php
    require_once 'Teacher.php';    
    if (isset($_GET['success'])) 
    {
        if ($_GET['success'] == 1)
        {
            echo "<p style='color: green;'>L'enseignant a été ajouté avec succès !</p>";
        }
        if ($_GET['success'] == 2)
        {
            echo "<p style='color: green;'>L'enseignant a été supprimé avec succès !</p>";
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
        <script src="update_teacher.js"></script>
		<title> Teachers </title>
		<meta charset="UTF-8"/>
	</head>
	<body>
        <h1>
		    TEACHERS MANAGEMENT
        </h1>
        <div id="ajout_teacher">
            <h2>
                AJOUTER UN ENSEIGNANT
            </h2>
            <form action="ajouter_enseignant.php" method="post">
                <label for="id">L'id de l'enseignant:</label>
                <input type="text" id="id" name="id" placeholder="L'id de l'enseignant ici" required>
                <label for="lastName">Le nom de l'enseignant:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Le nom de l'enseignant ici" required>
                <label for="firstName">Prénom de l'enseignant:</label>
                <input type="text" id="firstName" name="firstName" placeholder="Prénom de l'enseignant ici" required>
                <label for="specialty">Spécialité:</label>
                <input type="text" id="specialty" name="specialty" placeholder="Spécialité ici" required>
                <label for="courseList">Liste des cours (séparés par des virgules ",") :</label>
                <input type="text" id="courseList" name="courseList" placeholder="Liste des cours ici" required>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div id="liste_cours">
            <h2>
                LISTE DES ENSEIGNANTS
            </h2>
            <table border="1">
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Spécialité</th>
                <th>Liste des Cours</th>
                <?php Teacher::displayFromFile(); ?>
            </table>
        </div>
	</body>
</html>
