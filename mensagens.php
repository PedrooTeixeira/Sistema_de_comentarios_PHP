<?php

Class Mensagens{

    private $pdo;

    //Função contrutora para conexão automática com banco de dados
    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=id7424184_crud;host=localhost;","user","password");
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    //Função para inserir mensagem no banco de dados
    public function inserirMsg($nome, $mensagem){

            $sql = $this->pdo->prepare("INSERT INTO mensagens SET nome = :nome, msg = :msg, data_msg = NOW() + 1 ");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":msg", $mensagem);
            $sql->execute();
        }

    //Função que verifica se à mensagens no banco de dados e listar
    public function listarMsg(){
        $sql = "SELECT * FROM mensagens ORDER BY data_msg desc";
        $sql =  $this->pdo->query($sql);

        $array  = array();

        if($sql->rowCount()> 0){
            $array = $sql->fetchAll();
        }else{
            echo"<p>Não há mensagens!</p>";
        }
        return $array;
    }
    
    //Função para contar quantas mensagens à no banco
    public function contarMensagens(){
        $sql = "SELECT * FROM mensagens";
        $sql = $this->pdo->query($sql);
        return $sql->rowCount();
    }

}