<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'envoi';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Traitement de la requête AJAX
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Vérification si l'email existe déjà dans la table 'abonne'
    $stmt = $pdo->prepare("SELECT * FROM abonne WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $emailExist = $stmt->fetch();

    if ($emailExist) {
        // L'email existe déjà
        echo '<p style="color:white; padding: 12px 12px; background-color:#ff020271;">L\'utilisateur existe déjà.</p>';
    } else {
        // Insertion de l'email dans la table 'abonne'
        $stmt = $pdo->prepare("INSERT INTO abonne (email) VALUES (:email)");
        
        if ($stmt->execute(['email' => $email])) {
            echo '<p style="color:white; padding: 12px 12px; background-color:#5cf7353a;">Succès ! Vous êtes abonné.</p>';
        } else {
            echo '<p style="color:white; padding: 12px 12px; background-color:red;">Échec de l\'abonnement. Veuillez réessayer.</p>';
        }
    }
}
?>