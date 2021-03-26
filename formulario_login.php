<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de login</title>
</head>
<body>
    <fieldset>
        <legend>Login</legend>
        <form method="POST" action="autenticar.php">
        <?php if( isset($_GET['erro'])): ?>
            <div>Erro: <?=$_GET['erro']?> </div>
        <?php endif; ?>
            <label>
                Email:
                <input name="email" type="email"/>
            </label>

            <label>
                Senha:
                <input type="password" name="senha"/>
            </label>
            <button type="submit">Enviar</button>
        </form>
    </fieldset>
</body>
</html>