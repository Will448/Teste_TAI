<?php

class BD {

    private $host ="localhost";
    private $dbname ="teste";
    private $port = 3306;
    private $usuario = "root";
    private $senha = "";
    private $db_charset = "utf8";

    public function conn(){
        $conn = "mysql:host=$this->host;
            dbname=$this->dbname;port=$this->port";

        return new PDO($conn,$this->usuario,$this->senha,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ". $this->db_charset]
    );
    }
     public function select(){
         $conn = $this->conn();
         $st = $conn->prepare("SELECT * FROM usuario");
         $st->execute();

        return $st;
     }

     public function inserir($dados){
        $conn = $this->conn();
        $sql = "INSERT INTO usuario SET (nome, cpf, telefone) values(?,?,?)";
        $st = $conn->prepare($sql);
        $arrayDados = [$dados['nome'], $dados['cpf'], $dados['telefone']];

        $st->execute($arrayDados);

        return $st;

}
}
?>