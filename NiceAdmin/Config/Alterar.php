<?php

include("Config.php");

$config = new Config();

$config->QuemSomos = $_POST["QuemSomos"];
$config->TelefoneContato = $_POST["TelefoneContato"];
$config->Endereco = $_POST["Endereco"];
$config->EmailContato = $_POST["EmailContato"];

echo $config->Alterar();

echo " <meta http-equiv='refresh' content='3;URL=Index.php'>";
