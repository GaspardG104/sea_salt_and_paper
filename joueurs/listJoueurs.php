<?php
require_once '../config/db_connect.php';

$conn = openDatabaseConnection();
$stmt = $conn->query("SELECT * FROM joueurs ORDER BY score");
$joueurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
closeDatabaseConnection($conn);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>List des Joueurs</title>
    <!-- Partie Font-Aweson-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"rel="stylesheet">

    <!-- Partie Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Liste des Joueurs</h1>

            <div class="actions">
                <a href="createJoueur.php" class="btn btn-success" >Ajouter un joueur</a>
            </div>
        <table class = "table table-striped">
            <tr>
                <th>Score</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
                <?php foreach($joueurs as $joueur): ?>
            <tr>
                <td><?= $joueur['score'] ?></td>
                <td><?= $joueur['nom'] ?></td>
                <td><?= $joueur['prenom'] ?></td>
                <td>
                    <a href="editJoueur.php?id=<?= $joueur['id'] ?>" class="btn btn-primary" ><i class="fas fa-pen"></i></a>
                    <a href="deleteJoueur.php?id=<?= $joueur['id'] ?>" class="btn btn-danger"
                        onclick="return confirm('Êtes-vous sûr?')"><i class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>

    <!-- Parti JS de Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>