<?php

class DataBase {

    var $servidor = 'localhost';
    var $banco = 'banco';
    var $usuario = 'root';
    var $senha = '';
    var $rs;

    function DataBase() {
        
    }

    function Connect() {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->senha);

        if (!$this->link) {
            echo "Erro ao conectar ao banco de dados.<br />";
            echo "Erro: " . mysql_error();
            die();
        } elseif (!mysql_select_db($this->banco, $this->link)) {
            echo "O Banco de Dados solicitado não pode ser aberto!<br />";
            echo "Erro: " . mysql_error();
            die();
        }
    }

    function Disconnect() {
        return mysql_close($this->link);
    }

    function ExecuteQuery($sql) {
        //$this->Connect();

        $this->rs = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

        //$this->Disconnect();

        return $this->rs;
    }
}
