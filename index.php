<?php
    session_start();

    if( !isset($_SESSION['dados_usuario']))
        header("Location: formulario_login.php");
    

    if( isset($_GET['sair']))
    {
        session_destroy();
        header("Location: formulario_login.php");
    }
?>  

<html>
    <head>
    
    </head>

    <body>
        <h1> Bem-vindo a área restrita, <?=$_SESSION['dados_usuario']['nome'] ?>, cadastrado em <?=$_SESSION['dados_usuario']['data_cad'] ?></h1>
        <a href="?sair=true">Sair</a>
    </body>
</html>