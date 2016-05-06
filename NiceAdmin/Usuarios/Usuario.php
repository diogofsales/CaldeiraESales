<?php

class Usuario {

    public $Id;
    public $Nome;
    public $Login;
    public $Senha;
    public $Bloqueado;
    public $DataCadastro;    

    function Usuario() {
        include("../../Database.php");
    }

    function getById($Id) {
        $sql = "select Id, Nome, Login, Senha, Bloqueado, DataCadastro from usuarios where id = " . $Id;

        $db = new DataBase();

        $db->Connect();

        $usuario = mysql_fetch_assoc($db->ExecuteQuery($sql));

        $db->Disconnect();

        $this->Id = $usuario["Id"];
        $this->Nome = $usuario["Nome"];
        $this->Login = $usuario["Login"];
        $this->Senha = $usuario["Senha"];
        $this->Bloqueado = $usuario["Bloqueado"];
        $this->DataCadastro = date("d/m/Y", strtotime(str_replace('-', '/', $usuario["DataCadastro"])));   
    }

    function Alterar(Usuario $Usuario) {
        
        $DataCadastro = date("Y-m-d", strtotime(str_replace('/', '-', $Usuario->DataCadastro)));   
        
        $sql = "update usuarios "
                . "set Nome = '" . html_entity_decode($Usuario->Nome) . "'"
                . "   ,Login = '" . html_entity_decode($Usuario->Login) . "'"
                . "   ,Senha = '" . html_entity_decode($Usuario->Senha) . "'"
                . "   ,Bloqueado = " . $Usuario->Bloqueado
                . "   ,DataCadastro = '".$DataCadastro."'"
                . " where Id =".$Usuario->Id;

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro alterado.";
    }
    
    function Incluir(){ 
        $DataCadastro = date("Y-m-d", strtotime(str_replace('/', '-', $this->DataCadastro)));   
        
        $sql = "insert into usuarios(Nome, Login, Senha, Bloqueado, DataCadastro)"
                . "values('".$this->Nome."', '".$this->Login."', '".$this->Senha."', ".$this->Bloqueado.", '".$DataCadastro."')";

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro inserido.";   
    }

}
