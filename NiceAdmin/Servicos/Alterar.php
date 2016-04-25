<?php

include("Servico.php");

$servico = new Servico();

$servico->Nome = $_POST["Nome"];
$servico->Descricao = $_POST["Descricao"];
$servico->CaminhoImagem = $_POST["CaminhoImagem"];

if (isset($_GET["Id"])){    
    $servico->Id = $_GET["Id"];
    
    $servico->Alterar($servico);
}
else{
    $servico->Incluir($servico);
}

echo " <meta http-equiv='refresh' content='3;URL=Index.php'>";