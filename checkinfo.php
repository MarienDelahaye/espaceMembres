<?php
$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');
$pass_crypt = ($_POST['pass']);

$pseudo = $_POST['pseudo'];
$request = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
$request->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_crypt
));

$result = $request->fetch();

if (!$result)
{
    echo 'Wrong password or username';
}
else
{
    session_start();
    $_SESSION['id'] = $result['id'];
    $_SESSION['pseudo'] = $pseudo;
    echo 'You are logged in';
}