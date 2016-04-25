<!DOCTYPE html>
<html>
    <head>
        <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/lightbox.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <meta charset="UTF-8">
        <title>Alterar</title>

    </head>
    <body>
        <?php
        include("../../DataBase.php");
        
        $action = "alterar.php";

        if (isset($_GET["Id"])) {
            $action .= "?Id=" . $_GET["Id"];

            $db = new DataBase();
            $db->Connect();

            $projeto = $db->ExecuteQuery("select Id, Nome, Descricao, DataInicio, DataFim from projetos where Id=".$_GET["Id"]);
            
            $db->Disconnect();
            
            $row = mysql_fetch_array($projeto);
        }
        ?>
        <div id="contact" class="contact">
            <div class="container">
                <div class="contact-grids">
                    <form action="<?= $action ?>" name="form_contato" method="post">

                        <input type="text" placeholder="Id" name="Id" <?php if(isset($row)){ echo 'value='.$row["Id"]; }?>>
                        <input type="text" placeholder="Nome" name="Nome" <?php if(isset($row)){ echo 'value='.$row["Nome"]; }?>>
                        <input type="text" placeholder="Descricao" name="Descricao" <?php if(isset($row)){ echo 'value='.$row["Descricao"]; }?>>
                        <!--<input type="date" placeholder="Data Inicio" name="datainicio">-->
                        <!--<textarea placeholder="Mensagem..." name="mensagem"></textarea>-->
                        <input type="submit" value="SALVAR...">

                    </form>
                </div>			 

            </div>
    </body>
</html>
