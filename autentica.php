<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

session_start();
include('class.php');
include('banco.php');

$db = new banco;

if (isset($_POST['login'])) {
     $login = $_POST['login'];
     $senha = $_POST['senha'];
     $senha_confirma = $_POST['senha_confirma'];

     $teste = [
          'login' => mysqli_real_escape_string($db->conn, $login),
          'senha' => mysqli_real_escape_string($db->conn, $senha),
          'senha_confirma' => mysqli_real_escape_string($db->conn, $senha_confirma)
     ];

     $validar =  new usuario;
     $resultado = $validar->validar($teste);
     // header('location: index.php');

     if ($resultado == 1) {
          $_SESSION['message'] = "Bem vindo(a): &nbsp;" . $login;

          $_SESSION['username'] = $login;
        //  echo "sucesso";
          header('location:  busca.php');
     } else {
          $_SESSION['message'] = "Login incorreto";
        //  echo "erro";
          header('location: index.php');
     }
} else {
     $_SESSION['message'] = "deu errado";
     header('location: index.php');
}
?>