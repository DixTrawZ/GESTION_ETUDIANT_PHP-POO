<?php
    require_once 'Course.php';
    if (isset($_GET['success'])) 
    {
        if ($_GET['success'] == 1)
        {
            echo "<p style='color: green;'>Le cours a été ajouté avec succès !</p>";
        }
        if ($_GET['success'] == 2)
        {
            echo "<p style='color: green;'>Le cours a été supprimé avec succès !</p>";
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
        <script src="update_course.js"></script>
		<title> Courses </title>
		<meta charset="UTF-8"/>
	</head>
	<body>
        <h1>
		    COURSES MANAGEMENT
        </h1>
        <div id="ajout_course">
            <h2>
                AJOUTER UN COURS
            </h2>
            <form action="ajouter_cours.php" method="post">
                <label for="id">L'id du cours:</label>
                <input type="text" id="id" name="id" placeholder="L'id du cours ici" required>
                <label for="name">Le nom du cours:</label>
                <input type="text" id="name" name="name" placeholder="Le nom du cours ici" required>
                <label for="description">Description du cours:</label>
                <input type="text" id="description" name="description" placeholder="Description du cours ici" required>
                <label for="credits">Credits du cours:</label>
                <input type="text" id="credits" name="credits" placeholder="Credits du cours ici" required>
                <label for="teacherId">ID de l'enseignant du cours :</label>
                <input type="text" id="teacherId" name="teacherId" placeholder="ID de l'enseignant du cours ici" required>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div id="liste_cours">
            <h2>
                LISTE DES COURS
            </h2>
            <table border="1">
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Crédits</th>
                <th>ID de l'Enseignant</th>
                <?php Course::displayFromFile(); ?>
            </table>
        </div>
	</body>
</html>
