<?php
    //variaveis
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    //$email = "diogofsales@gmail.com";
    $telefone = $_POST["telefone"];
    $assunto = "Contato pelo site";
    $destino = "caldeiraesalessales@gmail.com";
    $mensagem = $_POST["mensagem"];
    
    
    // É necessário indicar que o formato do e-mail é html
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: projetos@caldeiraesales.com.br";

    $arquivo = "<style type='text/css'>
                    body {
                        margin:0px;
                        font-family:Verdane;
                        font-size:12px;
                        color: #666666;
                    }
                    a{
                        color: #666666;
                        text-decoration: none;
                    }
                    a:hover {
                        color: #FF0000;
                        text-decoration: none;
                    }
                </style>
                <html>
                    <table>
                        <tr>
                            <td>
                                <tr>
                                    <td>Nome:".$nome."</td>
                                </tr>
                                <tr>
                                    <td>E-mail:<b>".$email."</b></td>
                                </tr>
                                <tr>
                                    <td>Telefone:<b>".$telefone."</b></td>
                                </tr>
                                <tr>
                                    <td>Mensagem:".$mensagem."</td>
                                </tr>
                            </td>
                        </tr> 
                    </table>
                </html>";


    
    //envia e-mail
    $enviaremail = mail($destino, $assunto, $arquivo, "From: projetos@caldeiraesales.com.br");
    //$enviaremail = mail($destino, $assunto, $arquivo, $headers);    
    
    if($enviaremail){
        $mgm = "E-MAIL ENVIADO COM SUCESSO!";
        echo $mgm."\r\n".$arquivo;
        echo " <meta http-equiv='refresh' content='3;URL=index.php'>";
    } else {
        $mgm = "ERRO AO ENVIAR E-MAIL!";
        echo $mgm;
    }     
