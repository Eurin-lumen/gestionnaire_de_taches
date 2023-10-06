-- Créez une base de données s'il n'existe pas déjà
CREATE DATABASE IF NOT EXISTS gestionnaire_taches;

-- Utilisez la base de données que vous venez de créer
USE gestionnaire_taches;

-- Créez une table pour stocker les tâches
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    task_description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
