<?php
require_once('Database.php');
require_once('routes/api.php');

$id = $_GET['id'] ?? "";
$menu = $_GET['menu'] ?? "";

$api = new StarWarsAPI($id, $menu, $conn);

$dados = $api->fetchData();

echo json_encode($dados);
?>
