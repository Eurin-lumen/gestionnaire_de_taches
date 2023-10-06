<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Tâches</title>
    <link rel="stylesheet" href="styles.css">
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
            <table>
                <thead>
                    <tr>
                        <th>Nom de la Tâche</th>
                        <th>Description de la Tâche</th>
                        <th>Actions</th>
                    </tr>
                </thead>


            <script>
                function confirmDelete(taskId) {
                    if (confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) {
                        // Si l'utilisateur clique sur OK, soumettez le formulaire de suppression
                        document.getElementById('delete-form-' + taskId).submit();
                    }
                }
            </script>

            <script>
                function showEditForm(taskId) {
                    // Cacher tous les formulaires de modification
                    var editForms = document.querySelectorAll('.edit-form');
                    editForms.forEach(function(form) {
                        form.style.display = 'none';
                    });

                    // Afficher le formulaire de modification correspondant à la tâche
                    var editForm = document.getElementById('edit-form-' + taskId);
                    editForm.style.display = 'block';
                }
            </script>


<!-- ... Autre contenu HTML ... -->

                <tbody>
                    <?php
                    // Intégration de PHP pour récupérer et afficher les tâches depuis la base de données
                    include('db/config.php'); // Inclure le fichier de connexion à la base de données

                    $sql = "SELECT * FROM tasks";
                    $stmt = $pdo->query($sql);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $row['task_name'] . '</td>';
                        echo '<td>' . $row['task_description'] . '</td>';
                        echo '<td>';
                        
                        // Bouton "Modifier" avec un identifiant unique pour le formulaire
                        echo '<button class="edit-button" onclick="showEditForm(' . $row['id'] . ')">Modifier</button>';
                        
                        // Formulaire de modification caché par défaut
                        echo '<form action="edit_task.php" method="post" class="edit-form" id="edit-form-' . $row['id'] . '" style="display:none;">';
                        echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
                        echo '<label for="task_name">Nom de la Tâche:</label>';
                        echo '<input type="text" id="task_name" name="task_name" value="' . $row['task_name'] . '" required>';
                        echo '<label for="task_description">Description de la Tâche:</label>';
                        echo '<textarea id="task_description" name="task_description" required>' . $row['task_description'] . '</textarea>';
                        echo '<button type="submit">Modifier la Tâche</button>';
                        echo '</form>';
                        
                        echo '<form action="delete_task.php" method="post" class="delete-form" id="delete-form-' . $row['id'] . '">';
                        echo '<input type="hidden" name="task_id" value="' . $row['id'] . '">';
                        echo '<button class="delete-button" onclick="confirmDelete(' . $row['id'] . ')">Supprimer</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    

                    ?>
                </tbody>

                

            </table>
        </div>
    </div>
</body>
</html>
