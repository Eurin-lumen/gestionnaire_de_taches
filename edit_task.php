<?php
include('db/config.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    // Requête SQL pour récupérer la tâche à modifier (pour afficher les valeurs actuelles)
    $select_sql = "SELECT * FROM tasks WHERE id = :task_id";
    $stmt_select = $pdo->prepare($select_sql);
    $stmt_select->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $stmt_select->execute();
    $task = $stmt_select->fetch(PDO::FETCH_ASSOC);

    // Requête SQL pour mettre à jour la tâche
    $update_sql = "UPDATE tasks SET task_name = :task_name, task_description = :task_description WHERE id = :task_id";
    $stmt_update = $pdo->prepare($update_sql);
    $stmt_update->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $stmt_update->bindParam(':task_name', $task_name, PDO::PARAM_STR);
    $stmt_update->bindParam(':task_description', $task_description, PDO::PARAM_STR);

    // Exécution de la mise à jour de la tâche
    if ($stmt_update->execute()) {
        // Rediriger vers la page d'accueil après la modification de la tâche
        header('Location: index.php');
    } else {
        echo "Erreur lors de la modification de la tâche.";
    }
}
?>
