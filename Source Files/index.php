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
        $dados = $listar->listar();
        //var_dump($dados);
        foreach($dados as $row_msg_contato){
            extract ($row_msg_contato);
            echo "ID: ".$id."<br>";
            echo "Nome: ".$nome."<br>";
            echo "E-mail: ".$email."<br>";
            echo "Titulo da Mensagem: ".$titulo_msg."<br>";
            echo "Conteudo da Mensagem: ".$conteudo_msg."<br>";
            echo "<hr>";
        }
    ?>
</body>
</html>