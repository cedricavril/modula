<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <title>PPP - admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- will be worthy to chop bs here too lately -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
  if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1')
    require('../back-end/private/PDOFactory.local.class.php');
  else
    require('../back-end/private/PDOFactory.class.php');
  try {
    $db = PDOFactory::getMysqlConnexion();
  } catch (PDOException $e) {
    echo $e->getMessage();
    die();
  }
?>

  <div class="container">

  <?php $stmt = $db->query("SELECT id, DATE_FORMAT(date_envoi, '%d/%m/%Y') as dateEnvoi, DATE_FORMAT(date_envoi, '%Hh%imin%ss') as heureEnvoi, email FROM modula_users ORDER BY date_envoi DESC"); 
    $row = $stmt->fetch();
    if (!$row) {
      echo "Aucun envoi réalisé";
      exit;
    } else {
      include "connectionScript.php";
      if($_POST) include "check.php"; 
    }?>

    <h2>Liste des formulaires de contact ayant été envoyés : (<u style=" white-space: nowrap;">Cliquer sur la date pour les détails</u>)</h2>

  <?php
  $i = 0; 
  do {
    $i++; ?>
      <ul class="list-group list-group-horizontal">
        <li class="list-group-item"><?= $row['email']; ?></li>
        <li class="list-group-item">
          <form id="details<?= $i ?>" action="#" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>"/> 
            <a href='#' onclick='document.getElementById("details<?= $i ?>").submit()'><?= $row['dateEnvoi']; ?></a>
          </form> 
        </li>
        <li class="list-group-item"><?= $row['heureEnvoi']; ?></li>
      </ul>
    <?php } while ($row = $stmt->fetch()) ?>
  </div>
<script type="text/javascript">
  document.getElementById("connection-form").style.display = "none";
</script>
</body>
</html>
