<?php
require_once './Conn.php';
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
}