<?php

include("../../DataBase.php");

$QuemSomos = $_POST["QuemSomos"];
$TelefoneContato = $_POST["TelefoneContato"];
$Endereco = $_POST["Endereco"];
$EmailContato = $_POST["EmailContato"];

$sql = "update config "
        . "    set QuemSomos = '" . html_entity_decode($QuemSomos) . "'"
        . "        ,TelefoneContato = '" . html_entity_decode($TelefoneContato) . "'"
        . "        ,Endereco = '" . html_entity_decode($Endereco) . "'"
        . "        ,EmailContato = '" . html_entity_decode($EmailContato) . "'"
        . " where Id = 1";

$msg = "Registro alterado.";

$db = new DataBase();
$db->Connect();

$db->ExecuteQuery($sql);

$db->Disconnect();

echo $msg;
echo " <meta http-equiv='refresh' content='3;URL=formulario.php'>";



