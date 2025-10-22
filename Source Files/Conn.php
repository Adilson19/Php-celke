<?php
class Conn{
    public string $host = 'localhost';
    public string $user = 'root';
    public string $pass = '1234';
    public string $dbname = 'celke';
    public string $port = '3308';
    public object $connect;

    public function conectar(): object{
        try{
            $this->connect = new PDO('
                mysql:host='.$this->host.';
                    port='.$this->port.';
                    dbname='.$this->dbname,
                    $this->user, 
                    $this->pass);
                return $this->connect;
        }catch(PDOException $ex){
            //die("erro:..." . $ex);
            die("Erro: Por favor, verifique suas credenciais de acesso ao banco de dados!");
        }
    }
}