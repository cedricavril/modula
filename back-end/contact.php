<?php
	require('../recaptcha-master/src/autoload.php');

    $responseArray = $_POST;

	// CAPTCHA
	$recaptchaSecret = '6LeFBJkUAAAAAFHsi-L22cLFgm77yTvjQZ5NjzbT';

	try {
	    if (!empty($_POST)) {

	        $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());

	        $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

	        if (!$response->isSuccess()) throw new \Exception('Recaptcha non validé.');

	        // everything went well, we can compose the message, as usually
	        if(count($_POST) == 0) throw new \Exception('Formulaire vide.');
		} else throw new \Exception('$_POST est vide');
	} catch (\Exception $e) {
	    $response = "erreur de captcha";
	}
	// \CAPTCHA

	$error = "";
	require('private/PDOFactory.class.php');
	try {
		$db = PDOFactory::getMysqlConnexion();
    } catch (PDOException $e) {
        $error = $e->getMessage();
		header("HTTP/1.0 404 Not Found");
  		exit();
    }

    $q = $db->prepare('INSERT INTO modula_users SET nom = :nom, prenom = :prenom, email= :email, message = :message, date_envoi = NOW(), ip = :ip');
    $q->bindValue(':nom', $_POST['nom']);
    $q->bindValue(':prenom',  $_POST['prenom']);
    $q->bindValue(':email',  $_POST['email']);
    $q->bindValue(':message',  $_POST['message']);
    $q->bindValue(':ip',  $_SERVER['REMOTE_ADDR']);

    $q->execute();

// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
?>