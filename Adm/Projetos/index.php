<?php 
    include("../../DataBase.php");
    $db = new DataBase();
    $db->Connect();
    
    $projetos = $db->ExecuteQuery("select Id, Nome, Descricao, DataInicio, DataFim from projetos");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projetos</title>
    </head>
    <body>
        <table>
            <tr>
                <td>Editar</td>
                <td>Excluir</td>
                <td>Id</td>
                <td>Nome</td>
                <td>Descricao</td>
                <td>Data Incicio</td>
                <td>Data Fim</td>
            </tr>
            <?php
                while ( $row = mysql_fetch_assoc($projetos) ){
                    echo 
                        '<tr>
                            <td><a href="formulario.php?Id='.$row["Id"].'">Editar</a></td>
                            <td><a href="Excluir.php?Id='.$row["Id"].'">Excluir</a></td>
                            <td>'.$row["Id"].'</td>
                            <td>'.$row["Nome"].'</td>
                            <td>'.$row["Descricao"].'</td>
                            <td>'.$row["DataInicio"].'</td>
                            <td>'.$row["DataFim"].'</td>
                        </tr>';        
                }
            
            ?>
        </table>
        <br>
        <a href="formulario.php">Novo</a>
        <br>
        <a href="../index.php">Voltar</a>
    </body>
</html>
<?php
    $db->Disconnect();