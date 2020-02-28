<?php
class PDOFactory
{

  public static function getMysqlConnexion()
  {
    $db = new \PDO('mysql:host=localhost;dbname=modula_users;charset=utf8', 'root', '');

    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $db->exec("SET NAMES utf8");

    return $db;
  }
}
?>