<?php

include("Usuario.php");

$usuario = new Usuario();

$usuario->Nome = $_POST["Nome"];
$usuario->Login = $_POST["Login"];
$usuario->Senha = $_POST["Senha"];

if (isset($_POST["Bloqueado"]))
    $usuario->Bloqueado = 1;
else 
    $usuario->Bloqueado = 0;

$usuario->DataCadastro = $_POST["DataCadastro"];

if (isset($_GET["Id"])){    
    $usuario->Id = $_GET["Id"];
    
    $usuario->Alterar($usuario);
}
else{
    $usuario->Incluir($usuario);
}

//echo $usuario->DataCadastro;

echo " <meta http-equiv='refresh' content='3;URL=Index.php'>";