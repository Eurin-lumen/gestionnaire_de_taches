<?php
include('db.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID de la tâche à supprimer
    $task_id = $_POST['task_id'];

    // Requête SQL pour supprimer la tâche
    $sql = "DELETE FROM tasks WHERE id = :task_id";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Rediriger vers la page d'accueil après la suppression de la tâche
        header('Location: index.php');
    } else {
        echo "Erreur lors de la suppression de la tâche.";
    }
}
?>
<!-- Vous pouvez ajouter le formulaire de confirmation de suppression de tâches ici -->
