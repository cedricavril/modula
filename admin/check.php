<div id="admin-flash" class="alert alert-primary alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php
	$checkStmt = $db->query("SELECT DATE_FORMAT(date_envoi, '%d/%m/%Y') as dateEnvoi, DATE_FORMAT(date_envoi, '%Hh%imin%ss') as heureEnvoi, message, nom, prenom, email FROM modula_users WHERE id = " . $_POST['id'] . ""); 
	$checkRow = $checkStmt->fetch();

  	echo 	"<h1><b>Message de</b> " . $checkRow['nom'] . " " .$checkRow['prenom'] . " : </h1><p>" .
  			"<b>adresse mail</b> : <br>" . nl2br($checkRow['email']) . "<br>" .
  			"<b>message</b> : <br>" . nl2br($checkRow['message']) . "<br>" .
  			"<b>date</b> : " . $checkRow['dateEnvoi'] . 
  			" <b>heure</b> : " . $checkRow['heureEnvoi'] . "</p>";
?>
</div>