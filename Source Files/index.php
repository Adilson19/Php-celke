<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Listar Mensagem de Contato</h1>
    <a href="cadastrar.php">Cadastrar</a>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        require './MsgContatos.php';
        require './Conn.php';        
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