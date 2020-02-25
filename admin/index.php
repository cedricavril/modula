<!DOCTYPE html>
<html lang="en">
<head>
  <title>PPP - admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<?php
  $error = "";
  require('../back-end/private/PDOFactory.class.php');
  try {
    $db = PDOFactory::getMysqlConnexion();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo $error;
        die();
    }
?>


<div class="container">
  <h2>Liste des formulaires de contact ayant été envoyés</h2>
<?php $stmt = $db->query("SELECT DATE_FORMAT(date_envoi, '%d/%m/%Y') as dateEnvoi, DATE_FORMAT(date_envoi, '%Hh%imin%ss') as heureEnvoi, email FROM modula_users ORDER BY date_envoi DESC"); 
  while ($row = $stmt->fetch()) { ?>
    <ul class="list-group list-group-horizontal">
      <li class="list-group-item"><?php echo explode("@", $row['email'])[0] . "<br>@" . explode("@", $row['email'])[1]; ?></li>
      <li class="list-group-item"><?= $row['dateEnvoi']; ?></li>
      <li class="list-group-item"><?= $row['heureEnvoi']; ?></li>
    </ul>
  <?php } ?>
</div>
<div class="container">
  <h2>Dernier envoi réalisé</h2>
<?php 
  $stmt = $db->query("SELECT nom, prenom, DATE_FORMAT(date_envoi, '%d/%m/%Y') as dateEnvoi, DATE_FORMAT(date_envoi, '%Hh%imin%ss') as heureEnvoi, email, message FROM modula_users ORDER BY date_envoi DESC LIMIT 1"); 
  $row = $stmt->fetch();
  echo $row['email'] . ', ' . $row['nom'] . ', ' . $row['prenom'] . ', ' . $row['dateEnvoi'] . ', ' . $row['heureEnvoi'] . ', ' . $row['email'] . ', ' . $row['message']; ?>
  </ul>
</div>

</body>
</html>
