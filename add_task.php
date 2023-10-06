<?php
include('db/config.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    // Requête SQL pour insérer la nouvelle tâche
    $sql = "INSERT INTO tasks (task_name, task_description) VALUES (:task_name, :task_description)";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':task_name', $task_name, PDO::PARAM_STR);
    $stmt->bindParam(':task_description', $task_description, PDO::PARAM_STR);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Rediriger vers la page d'accueil après l'ajout de la tâche
        header('Location: index.php');
    } else {
        echo "Erreur lors de l'ajout de la tâche.";
    }
}
?>
<!-- Vous pouvez ajouter le formulaire d'ajout de tâches ici -->
