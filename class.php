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
            $tempo = date("Y-m-d H:i:s");
     
            echo  $sql = "INSERT INTO usuario (nome,login,senha,data_cad) VALUES
            ('$nome','$login','$senha','$tempo')";
            $result = $this->conn->query($sql);
     
            if ($result == 1) {
                //echo "ok";
                return true;
            } else {
                //echo "nok";
                return false;
            }
        }
        public function listar_usuarios()
        {
            $sql = "SELECT * FROM usuario";
            $resultado = $this->conn->query($sql);
            return $resultado;
        }

        
    public function listar_usuario($id, $acao)
    {

        if ($acao == 1) {
            $sql = "select * from usuario where id= '$id'";
            $resultado = $this->conn->query($sql);
            //$linha = $resultado->fetch_array();
            //return $linha;
            return $resultado;
        }
    }

    public function editar_usuario($inputData, $acao)
    {
        $id = $inputData['id'];
        $nome = $inputData['nome'];
        $login = $inputData['login'];
        $senha = $inputData['senha'];




        if ($acao == 1) {
          echo  $sql = "UPDATE `supermercado`.`nome` SET `nome` = '" . $nome . "', `login` = '" . $login . "', `senha` = '" . $senha . "' limit 1";
            $result = $this->conn->query($sql);
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
        $tempo = date("Y-m-d H:i:s");

        $sql = "INSERT INTO produto (nome,valor,imagem,quantidade,tempo) VALUES 
        ('" . $produto . "','" . $valor . "','" . $imagem . "','" . $quantidade . "','" . $tempo . "')";
        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }
    public function listar_produtos()
    {
        $sql = "SELECT * FROM produto";
        $resultado = $this->conn->query($sql);
        return $resultado;
    }

}







?>