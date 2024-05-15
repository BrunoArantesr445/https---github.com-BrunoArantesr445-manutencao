<?php

class usuario
{
    public $conn;
    public function __construct()
    {
        $db = new banco;
        $this->conn = $db->conn;
    }
    public function validar($inputData)
    {
        $login = $inputData['login'];
        $senha = $inputData['senha'];
 
        $sql = "select * from usuario where login='" . $login . "' and senha='" . $senha . "'";
        $result = $this->conn->query($sql);
        $linha = $result->fetch_array();
        $result = $result->num_rows;
 
        if ($result == 1) {
 
            $_SESSION["nome"] = $linha['nome'];
            return true;
        } else {
            echo "n salvou";
            return false;
        }
    }
 
    public function criar($inputData)
    {
        $nome = $inputData['nome'];
        $login = $inputData['login'];
        $senha = $inputData['senha'];

        
        echo  $sql = "INSERT INTO usuario (nome,login,senha) VALUES
        ('$nome','$login','$senha')";
        $result = $this->conn->query($sql);
 
        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }
}

class produto 
{
    public $conn;
    public function __construct()
    {
        $db = new banco;
        $this->conn = $db->conn;
    }

    public function cadastrar($inputData)
    {
        $produto = $inputData['produto'];
        $valor = $inputData['valor'];
        $imagem = $inputData['imagem'];
        $quantidade = $inputData['quantidade'];


        $sql = "INSERT INTO produto (nome,valor,imagem,quantidade) VALUES 
        ('" . $produto . "','" . $valor . "','" . $imagem . "','" . $quantidade . "')";
        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }


}







?>