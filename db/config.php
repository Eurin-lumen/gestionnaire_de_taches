<?php
// Définir les constantes de connexion à la base de données
define("DB_HOST", "localhost");     // L'hôte de la base de données (généralement "localhost" en développement)
define("DB_NAME", "gestionnaire_taches");  // Le nom de la base de données
define("DB_USER", "root");     // Votre nom d'utilisateur MySQL
define("DB_PASS", ""); // Votre mot de passe MySQL

try {
    // Créer une instance PDO pour la connexion à la base de données
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

    // Définir les options PDO pour générer des exceptions en cas d'erreur SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Définir le jeu de caractères de la connexion à UTF-8
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
