
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </div><br><br><br><br><br><br>
    <!--header-->
    
    <!-- Galerie -->
    <div class="galerie" id="gelerie">
        <div class="img-galerie">
            <div>
                <img  src="./images/educ-sante (1).jpg" alt="">
            </div>
            <div>
                <img src="./images/educ (5).jpg" alt="">
            </div>
            <div>
                <img src="./images/educ (1).jpeg" alt="">
            </div>
        </div>
        <br><br>
        <div class="img-galerie">
            <div>
                <img src="./images/educ (4).jpg" alt="">
            </div>
            <div>
                <img src="./images/educ (3).jpg" alt="">
            </div>
            <div>
                <img src="./images/educ (2).jpg" alt="">
            </div>
        </div>
        <br><br>
        <div class="img-galerie">
            <div>
                <img src="./images/educ-sante (1).jpg" alt="">
            </div>
            <div>
                <img src="./images/educ (5).jpg" alt="">
            </div>
            <div>
                <img src="./images/educ (1).jpeg" alt="">
            </div>
        </div>
        <br><br>
    </div>
<!-- Galerie -->


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

</script>
</body>
</html> 