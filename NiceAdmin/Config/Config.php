<?php

class Config {

    public $Id;
    public $QuemSomos;
    public $TelefoneContato;
    public $Endereco;
    public $EmailContato;

    function Config() {
        include("../../Database.php");
    }

    function getById($Id) {
        $sql = "select Id, EmailContato, TelefoneContato, QuemSomos, Endereco from config where id = " . $Id;

        $db = new DataBase();

        $db->Connect();

        $config = mysql_fetch_assoc($db->ExecuteQuery($sql));

        $db->Disconnect();

        $this->Id = $config["Id"];
        $this->EmailContato = $config["EmailContato"];
        $this->QuemSomos = $config["QuemSomos"];
        $this->Endereco = $config["Endereco"];
        $this->TelefoneContato = $config["TelefoneContato"];
    }

    function Alterar() {
        
        $sql = "update config "
                . "set QuemSomos = '" . html_entity_decode($this->QuemSomos) . "'"
                . "   ,TelefoneContato = '" . html_entity_decode($this->TelefoneContato) . "'"
                . "   ,Endereco = '" . html_entity_decode($this->Endereco) . "'"
                . "   ,EmailContato = '" . html_entity_decode($this->EmailContato) . "'"
                . " where Id = 1";

        $db = new DataBase();
        $db->Connect();

        $db->ExecuteQuery($sql);

        $db->Disconnect();
        
        return "Registro alterado.";
    }

}
