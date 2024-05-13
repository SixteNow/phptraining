<?php
// Obtenir les données de la requête AJAX
$id = $_POST['idpost'];

// Se connecter à la base de données
$db = new PDO('mysql:host=localhost;dbname=training', 'root', '');


// Préparer la requête SQL
$query = $db->prepare("DELETE FROM blog WHERE idpost=:id");

// Lier les paramètres et exécuter la requête
$query->execute([
    ':id' => $id,
]);


// Retourner une réponse
echo 'Suppression effectuee';
?>