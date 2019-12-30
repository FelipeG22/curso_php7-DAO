<?php 

require_once "config.php";

// SELECT sem a classe admin
/**
$sql = new Sql();

$admins = $sql->select("SELECT * FROM cw_admin");

echo json_encode($admins);
**/

// SELECT um admin pelo ID
/**
$adm = new Admin();

$adm->selectForId(3);

echo $adm;
**/
// Lista todos os admins
/**
$adm = Admin::getListAdmin();

echo json_encode($adm);
**/
// Pesquisa os Admins pelo apelido
/**
$pesquisa = Admin::pesquisarAdmin("Gonçalves");

echo json_encode($pesquisa);
**/
// Logar Admin
/**
$adm = new Admin();

$adm->logarAdmin("17351807779", "19951203");

echo $adm;
**/





?>