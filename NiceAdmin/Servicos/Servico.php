<?php

class Servico {

    public $Id;
    public $Nome;
    public $Descricao;
    public $CaminhoImagem;

    function Servico() {
        include("../../Database.php");
    }

    function getById($Id) {
        $sql = "select Id, Nome, Descricao, CaminhoImagem from servicos where id = " . $Id;

        $db = new DataBase();

        $db->Connect();

        $servico = mysql_fetch_assoc($db->ExecuteQuery($sql));

        $db->Disconnect();

        $this->Id = $servico["Id"];
        $this->Nome = $servico["Nome"];
        $this->Descricao = $servico["Descricao"];
        $this->CaminhoImagem = $servico["CaminhoImagem"];
    }

    function Alterar(Servico $Servico) {
        
        $sql = "update servicos "
                . "set Nome = '" . html_entity_decode($Servico->Nome) . "'"
                . "   ,Descricao = '" . html_entity_decode($Servico->Descricao) . "'"
                . "   ,CaminhoImagem = '" . html_entity_decode($Servico->CaminhoImagem) . "'"
                . " where Id =".$Servico->Id;

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro alterado.";
    }
    
    function Incluir(){            
        $sql = "insert into servicos(Nome, Descricao, CaminhoImagem)"
                . "values('".$this->Nome."', '".$this->Descricao."', '".$this->CaminhoImagem."')";

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro inserido.";   
    }

}
