<?php

class Projeto {

    public $Id;
    public $Nome;
    public $Descricao;

    function Projeto() {
        include("../../Database.php");
    }

    function getById($Id) {
        $sql = "select Id, Nome, Descricao from projetos where id = " . $Id;

        $db = new DataBase();

        $db->Connect();

        $projeto = mysql_fetch_assoc($db->ExecuteQuery($sql));

        $db->Disconnect();

        $this->Id = $projeto["Id"];
        $this->Nome = $projeto["Nome"];
        $this->Descricao = $projeto["Descricao"];
    }

    function Alterar(Projeto $Projeto) {
        
        $sql = "update projetos "
                . "set Nome = '" . html_entity_decode($Projeto->Nome) . "'"
                . "   ,Descricao = '" . html_entity_decode($Projeto->Descricao) . "'"
                . " where Id =".$Projeto->Id;

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro alterado.";
    }
    
    function Incluir(){
            
        $sql = "insert into projetos(Nome, Descricao)"
                . "values('".$this->Nome."', '".$this->Descricao."')";

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro inserido.";   
    }

}
