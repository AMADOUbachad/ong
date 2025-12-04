<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost"; // ou l'adresse de ton serveur
    $username = "root"; // ou ton utilisateur MySQL
    $password = ""; // ou ton mot de passe MySQL
    $dbname = "envoi";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Préparer et lier
    $stmt = $conn->prepare("INSERT INTO contact (nom, emails, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $emails, $subject, $message);

    // Définir les paramètres et exécuter
    $nom = $_POST["nom"];
    $emails = $_POST["emails"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    if ($stmt->execute()) {
        $response = "<div style='padding: 12px 12px; background-color:#4CAF50; color: white; ;'>Message envoyer avec succès</div>";
    } else {
        $response = "<div style='background-color: red; color: white; padding: 10px;'>Échec</div>";
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();

    echo $response;
}
?>
