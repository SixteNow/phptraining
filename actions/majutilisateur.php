<?php
session_start();
// Obtenir les données de la requête AJAX
$id =  strip_tags($_POST['id']);
$pseudo =  strip_tags($_POST['pseudo']);
$nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$mdp = strip_tags($_POST['mdp']);
$bio = strip_tags($_POST['bio']);

// Se connecter à la base de données
$db = new PDO('mysql:host=localhost;dbname=training', 'root', '');

// Vérifier si le pseudo existe déjà dans la table
if ($_SESSION['pseudo'] !== $pseudo) {
    $query_check_pseudo = $db->prepare("SELECT COUNT(*) FROM users WHERE pseudo = :pseudo");
    $query_check_pseudo->execute([':pseudo' => $pseudo]);
    $count = $query_check_pseudo->fetchColumn();

    if ($count > 0) {
        // Le pseudo existe déjà, afficher une erreur
        die('Erreur : Le pseudo existe déjà dans la base de données !');
    }
}

// Préparer la requête SQL
$query = $db->prepare("UPDATE users SET pseudo=:pseudo, nom=:nom, prenom=:prenom, mdp=:mdp, bio=:bio WHERE id=:id");

// Lier les paramètres et exécuter la requête
$query->execute([
    ':id' => $id,
    ':pseudo' => $pseudo,
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':mdp' => $mdp,
    ':bio' => $bio
]);

$_SESSION['nomprenom']=$nom.' '.$prenom;
$_SESSION['nom']=$nom;
$_SESSION['prenoms']=$prenom;
$_SESSION['pseudo']=$pseudo;
$_SESSION['pass']=$mdp;
// Retourner une réponse
echo 'Utilisateur mis à jour avec succès !';
?>