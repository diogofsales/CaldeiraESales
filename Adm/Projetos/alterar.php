<?php
include("../../DataBase.php");

$Nome = $_POST["Nome"];
$Descricao = $_POST["Descricao"];
//$DataInicio = $_POST["DataInicio"];
//$DataFim = $_POST["DataFim"];

if (isset($_GET["Id"])){
    $sql = "update projetos "
        . "    set Nome = '".$Nome."'"
        . "        ,Descricao = '".$Descricao."'"
       // . "        ,DataInicio = ".$DataInicio
        //. "        ,DataFim = ".$DataFim
        . " where Id = " . $_GET["Id"];
    
    $msg = "Registro alterado.";
}
else
{
    $sql = "insert into projetos(Nome, Descricao)
            values('".$Nome."'"
            .    ",'".$Descricao."'"
            //. "'".$DataInicio."', "
            //. "'".$DataFim."')";
            .")";            
    
    $msg = "Registro inserido.";
}

$db = new DataBase();
$db->Connect();

$db->ExecuteQuery($sql);

$db->Disconnect();

echo $msg;

echo " <meta http-equiv='refresh' content='3;URL=index.php'>";