<?php
include("../../DataBase.php");

$Id = $_GET["Id"];

$sql = "delete from projetos where Id = " . $Id;

$db = new DataBase();
$db->Connect();

$db->ExecuteQuery($sql);

$db->Disconnect();

echo 'registro excluido!';
echo " <meta http-equiv='refresh' content='3;URL=index.php'>";
