<?php

class Projeto {

    public $Id;
    public $Nome;
    public $Descricao;
    public $DataInicio;
    public $DataFim;

    function Projeto() {
        include("../../Database.php");
    }

    function getById($Id) {
        $sql = "select Id, Nome, Descricao, DataInicio, DataFim from projetos where id = " . $Id;

        $db = new DataBase();

        $db->Connect();

        $projeto = mysql_fetch_assoc($db->ExecuteQuery($sql));

        $db->Disconnect();

        $this->Id = $projeto["Id"];
        $this->Nome = $projeto["Nome"];
        $this->Descricao = $projeto["Descricao"];
        $this->DataInicio = date("d/m/Y", strtotime(str_replace('-', '/', $projeto["DataInicio"])));
        $this->DataFim = $projeto["DataFim"];
    }

    function Alterar(Projeto $Projeto) {
        
        $DataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $Projeto->DataInicio)));
        
        $sql = "update projetos "
                . "set Nome = '" . html_entity_decode($Projeto->Nome) . "'"
                . "   ,Descricao = '" . html_entity_decode($Projeto->Descricao) . "'"
                . "   ,DataInicio = '".$DataInicio."'"
                . " where Id =".$Projeto->Id;

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro alterado.";
    }
    
    function Incluir(){
            
        $DataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->DataInicio)));
        
        $sql = "insert into projetos(Nome, Descricao, DataInicio)"
                . "values('".$this->Nome."', '".$this->Descricao."', '".$DataInicio."')";

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro inserido.";   
    }

}
