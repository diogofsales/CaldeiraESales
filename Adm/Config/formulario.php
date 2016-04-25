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

        $db = new DataBase();
        $db->Connect();

        $config = $db->ExecuteQuery("select QuemSomos, TelefoneContato, Endereco, EmailContato from config where Id=1");

        $db->Disconnect();

        $row = mysql_fetch_array($config);
        
        ?>
        <div id="contact" class="contact">
            <div class="container">
                <div class="contact-grids">
                    <form action="Alterar.php" name="form_contato" method="post">
                        <textarea placeholder="Quem Somos" name="QuemSomos" Id="QuemSomos" <?php if(isset($row)){ echo "value='".$row["QuemSomos"]."'"; }?>></textarea>
                        <input type="text" placeholder="Telefone Contato" name="TelefoneContato" id="TelefoneContato" <?php if(isset($row)){ echo 'value='.$row["TelefoneContato"]; }?>>
                        <textarea placeholder="Endereço" name="Endereco" id="Endereco" <?php if(isset($row)){ echo 'value='.$row["Endereco"]; }?>></textarea>
                        <input type="text" placeholder="Email Contato" name="EmailContato" id="EmailContato" <?php if(isset($row)){ echo 'value='.$row["EmailContato"]; }?>>
                        <input type="submit" value="SALVAR...">
                    </form>
                </div>			 
            </div>
        </div>
    </body>
</html>
