<?php
    session_start();
    try {
        $dsn = "mysql:host=localhost:3306; dbname=sistema_hospital";
        $user = "root";
        $pass = "12345";
        $opts = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conexao = new PDO($dsn, $user, $pass, $opts);
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT u.id, u.nome, u.email,
                    DATE_FORMAT(u.data_cadastro, '%d/%m/%Y - %H:%m') AS data_cad
                FROM USUARIO u WHERE EMAIL=? AND SENHA=sha1(?);";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        $dados_usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($dados_usuario);
        if( $dados_usuario )
        {
            $_SESSION['dados_usuario'] = $dados_usuario;
            header("Location: index.php");
        } else {
            header("Location: formulario_login.php?erro=" . 'Login falhou');
        }
    } catch(Exception $e){
        echo $e->getMessage();
        header("Location: formulario_login.php?erro?=Falha interna");

    }
?>