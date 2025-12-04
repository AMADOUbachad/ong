

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./boxicons/css/boxicons.css">
    <link rel="stylesheet" href="./boxicons/css/boxicons.min.css">
    <title>Document</title>
</head>
<body>

    <!--header-->
    <div class="header">
        <header id="navbar">
            <div  class="logo"><a class="n_site" href="index.php">ONG</a></div>
            <nav id="nav-menu">
                <ul>
                    <li><a href="index.php">ACCUEIL</a></li>
                    <li><a href="index.php#propos">A PROPOS</a></li>
                    <li><a href="index.php#evenement">ACTUALITES/EVENEMENTS</a></li>
                    <li><a href="index.php#gelerie">GALERIE</a></li>
                    <li><a href="#">PROJET</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
        </header>
    </div><br><br><br><br><br>
    <!--header-->
    
    <div class="contact-form-container" id="contact">
        <h2>Contactez-nous</h2>
        <div id="response-message"></div>
        <form id="contact-form" action="process-form.php" method="post">
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="nom" placeholder="Votre nom complet" required>

            <label for="email">Email</label>
            <input type="email" id="emails" name="emails" placeholder="Votre adresse email" required>

            <label for="subject">Sujet</label>
            <input type="text" id="subject" name="subject" placeholder="Le sujet de votre message" required>

            <label for="message">Message</label>
            <textarea id="messages" name="message" placeholder="Votre message" required></textarea>

            <input type="submit" name="send" value="Envoyer">
        </form>
    </div>
<br><br>


   <!-- Footer -->
   <footer class="site-footer">
    <div class="footer-container">
        <div class="footer-row">
            <div class="footer-col">
                <h4>Ressources</h4>
                <ul>
                    <li><a href="#tutorials">Tutoriels</a></li>
                    <li><a href="#guides">Guides utilisateur</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#help">Centre d'aide</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Suivez-nous</h4>
                <div class="social-links">
                    <li><a href="#" target="_blank"><i class="bx bxl-facebook"></i> Facebook</a></li>
                    <li><a href="#" target="_blank"><i class="bx bxl-twitter"></i> Twitter</a></li>
                    <li><a href="#" target="_blank"><i class="bx bxl-instagram"></i> Instagram</a></li>
                    <li><a href="#" target="_blank"><i class="bx bxl-linkedin"></i> Linkedin</a></li>
                </div>
            </div>
            <div class="footer-col">
                <h4>Abonnez-vous</h4>
                <!-- Zone de message -->
                <div id="message" style="display: none;"></div>
                
                <!-- Formulaire -->
                <form id="subscription-form" class="subscription-form">
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                    <input type="submit" value="S'abonner">
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 ONG Tous droits réservés.</p>
        </div>
    </div>
</footer>    
<!-- Footer -->  
 
<!-- Script pour gérer l'AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#subscription-form').submit(function(e) {
        e.preventDefault(); // Empêche l'actualisation de la page
        
        var email = $('#email').val(); // Récupère l'email

        $.ajax({
            url: 'abonnement.php', // Le fichier PHP qui traite l'enregistrement
            type: 'POST',
            data: { email: email },
            success: function(response) {
                $('#message').html(response).fadeIn(); // Affiche le message
                $('#email').val(''); // Vide le champ email
            },
            error: function() {
                $('#message').html('<p style="color:white; background-color:red;">Erreur lors de l\'envoi</p>').fadeIn();
            }
        });
    });
});

    document.getElementById("contact-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    var formData = new FormData(this);
    
    fetch("process-form.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        var messageContainer = document.getElementById("response-message");
        messageContainer.innerHTML = data;
        document.getElementById("contact-form").reset(); // Réinitialise le formulaire
        
        // Masquer le message après 5 secondes
        setTimeout(function() {
            messageContainer.innerHTML = '';
        }, 3000);
    })
    .catch(error => console.error("Erreur:", error));
});
</script>

</body>
</html>