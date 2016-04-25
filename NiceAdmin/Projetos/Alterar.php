<?php

include("Projeto.php");

$projeto = new Projeto();

$projeto->Nome = $_POST["Nome"];
$projeto->Descricao = $_POST["Descricao"];

if (isset($_GET["Id"])){
    $projeto->Id = $_GET["Id"];
    
    $projeto->Alterar($projeto);
}
else{
    $projeto->Incluir($projeto);
}



echo " <meta http-equiv='refresh' content='3;URL=Index.php'>";
