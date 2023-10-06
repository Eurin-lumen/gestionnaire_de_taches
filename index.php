<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Tâches</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'avoir un fichier CSS lié ici -->
</head>
<body>
    <div class="container">
        <h1>Gestionnaire de Tâches</h1>

        <!-- Formulaire d'ajout de tâche -->
        <form action="add_task.php" method="post">
            <label for="task_name">Nom de la tâche:</label>
            <input type="text" id="task_name" name="task_name" required>
            <label for="task_description">Description de la tâche:</label>
            <textarea id="task_description" name="task_description" required></textarea>
            <button type="submit">Ajouter la Tâche</button>
        </form>

        <!-- Liste des tâches -->
        <div class="task-list">
            <h2>Liste des Tâches</h2>
            <ul>
                <!-- Vous pouvez générer dynamiquement les éléments de la liste ici -->
                <li>
                    <span>Nom de la Tâche 1</span>
                    <p>Description de la Tâche 1</p>
                    <button class="edit-button">Modifier</button>
                    <button class="delete-button">Supprimer</button>
                </li>
                <li>
                    <span>Nom de la Tâche 2</span>
                    <p>Description de la Tâche 2</p>
                    <button class="edit-button">Modifier</button>
                    <button class="delete-button">Supprimer</button>
                </li>
                <!-- ... Répétez cette structure pour chaque tâche existante -->
            </ul>
        </div>
    </div>
</body>
</html>
