    <?php
// Connexion base de données
$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');

// Encryption du mot de passe
$pass_crypt = sha1($_POST['pass']);


// Insertion
$pseudo = $_POST['pseudo'];
$pass_crypt = $_POST['pass'];
$email = $_POST['email'];
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_crypt,
    'email' => $email
));

    ?>