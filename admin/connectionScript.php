<form method="POST" action="#" id="connection-form">
	<legend>Page d'administration protégée</legend>
	<label><b>nom</b> : <input type="text" name="login"></label>
	<label><b>mot de passe</b> : <input type="password" name="pass"></label>
	<input type="submit" />
</form>
<?php if (isset($_POST['login']) AND isset($_POST['pass']))
{
    $login = $_POST['login'];
    $pass_crypte = md5($_POST['pass']);

	$connectionStmt = $db->query("SELECT nom, pass FROM modula_administrators WHERE nom='" . $login . "'"); 
	$row = $connectionStmt->fetch();
	if ($row['pass'] != $pass_crypte) {
		echo "<b>mot de passe erroné</b>";
		exit();
	} else $_SESSION['nom'] = $login;

} else if (!isset($_SESSION['nom'])) exit();
?>