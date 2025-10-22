<?php
//require_once './Conn.php';
class MsgContatos
{
    public object $connect;
    public $dados;

    public function listar(){
        //Instancia a conexão com o banco de dados
        $conn = new Conn();        
        //Chama o método conectar para estabelecer a conexão
        $this->connect = $conn->conectar();
        //Cria a query para listar as mensagens de contatos
        $query_msgs_contatos = "SELECT id, nome, email, titulo_msg, conteudo_msg, created, modified
            FROM msgs_contatos
            ORDER BY id DESC
            LIMIT 40
        ";
        //Prepara e executa a query
        $result_msgs_contatos = $this->connect->prepare($query_msgs_contatos);
        //  Execução da Query
        $result_msgs_contatos->execute();
        //   Ler mensagem que veio do banco de dados
        return $result_msgs_contatos->fetchAll();
        //  Exibir mensagem
        //var_dump($result_msgs_contatos);
    }

    public function cadastrar(){
        //var_dump($this->dados);
        //  Criar objecto
        $conn = new Conn();
        //  Chamar o método conectar para estabelecer a conexão
        $this->connect = $conn->conectar();
        $query_msg_contato = "INSERT INTO msgs_contatos 
            (nome, email, titulo_msg, conteudo_msg, created) VALUES 
            (:nome, :email, :titulo_msg, :conteudo_msg, NOW())";
        $cad_msg_contato = $this->connect->prepare($query_msg_contato);
        $cad_msg_contato->bindParam(':nome', $this->dados['nome'], PDO::PARAM_STR);
        $cad_msg_contato->bindParam(':email', $this->dados['email'], PDO::PARAM_STR);
        $cad_msg_contato->bindParam(':titulo_msg', $this->dados['titulo_msg'], PDO::PARAM_STR);
        $cad_msg_contato->bindParam(':conteudo_msg', $this->dados['conteudo_msg'], PDO::PARAM_STR);

        $cad_msg_contato->execute();

        if($cad_msg_contato->rowCount()){
            $_SESSION['msg'] = "<p style='color: green';>Mensagem cadastrada com sucesso!</p>";
            return true;
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000';>Erro: Mensagem nao cadastrada com sucesso</p>";
            return false;
        }
    }
}