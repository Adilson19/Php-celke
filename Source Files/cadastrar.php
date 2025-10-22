<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Cadastrar Mensagem de Contato</h1>
    <a href="index.php">Listar</a>
    <?php
        require './MsgContatos.php';
        require './Conn.php';

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);

        if(!empty($dados['SendCadMsg'])){
            //  instanciando a classe MsgContatos
            $cad_msg_contato = new MsgContatos();
            $cad_msg_contato->dados = $dados;
            // chamando o método cadastrar
            $cad_msg_contato->cadastrar();
        }
        // verifica se existe a mensagem na sessão
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form name="CadUser" action="" method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo" required><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite o seu email" required><br><br>

        <label>Titulo da mensagem: </label>
        <input type="text" name="titulo_msg" placeholder="Titulo da Mensagem" required><br><br>

        <label>Conteudo da Mensagem</label>
        <textarea name="conteudo_msg" placeholder="Conteudo da Mensagem" cols="50" rows="5"></textarea><br><br>

        <input type="submit" value="Cadastrar" name="SendCadMsg">

    </form>
</body>
</html>