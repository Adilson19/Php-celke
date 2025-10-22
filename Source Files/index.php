<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <?php
        require './Conn.php';
        require './MsgContatos.php';
        $listar = new MsgContatos();
        $msg = $listar->listar();
        echo $msg;
    ?>
</body>
</html>