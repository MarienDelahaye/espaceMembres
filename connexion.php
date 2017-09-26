<?php
// Connexion base de données
$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');

// Hachage du mot de passe
$pass_hache = sha1($_POST['post']);


// Vérification des identifiants
$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo and pass = :pass');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache));

    $resultat = $req->fetch();


    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }