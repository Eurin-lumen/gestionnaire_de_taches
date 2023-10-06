<?php
include('db.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    // Requête SQL pour mettre à jour la tâche
    $sql = "UPDATE tasks SET task_name = :task_name, task_description = :task_description WHERE id = :task_id";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $stmt->bindParam(':task_name', $task_name, PDO::PARAM_STR);
    $stmt->bindParam(':task_description', $task_description, PDO::PARAM_STR);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Rediriger vers la page d'accueil après la modification de la tâche
        header('Location: index.php');
    } else {
        echo "Erreur lors de la modification de la tâche.";
    }
}
?>
<!-- Vous pouvez ajouter le formulaire de modification de tâches ici -->
