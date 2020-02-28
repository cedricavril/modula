<?php include "includes/contact-head.html"; ?>
<body>
    <div id="page" class="page">
		<div class="background-bg bg bg1">
		<!-- Main Content -->
		<div class="main">
			<div class="main-w3l">
				<h1 class="logo-w3 editContent">Envoyez-nous un message</h1>
				<div id="flash">
					<span class="messages"></span>
				</div>
				<div class="w3layouts-main editContent">
					<h2 class="editContent">Renseignez tous les champs</h2>
					<form action="#" method="post">
						<div class="editContent">
							<input placeholder="Nom" name="nom" type="text" required>
						</div>
						<div class="editContent">
							<input placeholder="Prénom" name="prenom" type="text" required>
						</div>
						<div class="editContent">
							<input placeholder="Email" name="email" type="email" required>
						</div>
						<div class="editContent">
							<textarea placeholder="Votre message..." name="message" required></textarea>
						</div>
						<div class="checkbox">
							<input type="checkbox" name="rgpd" required >Veuillez cocher l'acceptation des RGPD - vos données personnelles ne seront ni revendues, ni utilisées à des fins commerciales
						</div>
 						<?php 
if (($_SERVER['REMOTE_ADDR'] != '127.0.0.1')) { ?>
 						<div class="g-recaptcha" data-sitekey="6LcuqtsUAAAAADlKfli_CPEiMlqF7-Mm0cUzVp1g" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div> 
<?php } ?>
 						<button class="btn" name="login" style="outline: none; cursor: inherit;" type="submit">Envoyer le message</button>
					</form>
				</div>
				<!-- /.main -->
				<!--footer-->
				<div class="footer-w3l">
					<p>© 2020 PPP. Tous droits réservés | Design by <a href="http://w3layouts.com">W3layouts</a></p>
				</div>
				<!--/.footer-->
			</div>
		</div>
<!-- /.Main Content -->
	</div>
</div>
<script type="text/javascript" src="js/flashMessaging.js"></script>
<script type="text/javascript">

$(document).ready( function(){

    window.verifyRecaptchaCallback = function (response) {
        $('input[data-recaptcha]').val(response).trigger('change')
    }

	$('form').submit(function(event) {
		event.preventDefault();
        user = {
            nom: $('.editContent input[name="nom"]').val(),
            email: $('.editContent input[name="email"]').val(), 
            prenom: $('.editContent input[name="prenom"]').val(),
            message: $('.editContent textarea[name="message"]').val(),
        };

        var calledUrl = "back-end/contactController.php";

        $.ajax({
            type: "POST",
            url: calledUrl,
            data: user,
            success: function (data)
            {
				flashShow('success', 'Message envoyé avec succès');
				$(".w3layouts-main editContent").hide();
            },
			statusCode: {
				404: function() {
					flashShow('danger', 'Erreur d\'envoi de données');
				}
			}
	    });
        return false;
    });
})
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body></html>