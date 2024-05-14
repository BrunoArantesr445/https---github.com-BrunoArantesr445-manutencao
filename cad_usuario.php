<?php
session_start();
include('banco.php');
include('class.php');
$db = new banco;
 
 
 echo "<pre>";
 print_r($_POST);
 echo "</pre>";
 
// if (isset($_SESSION['username'])) {
 
 
 
// if (isset($_POST['salva_usuario'])) {
//     $inputData = [
//         'nome' => mysqli_real_escape_string($db->conn, $_POST['nome']),
//         'login' => mysqli_real_escape_string($db->conn, $_POST['login']),
//         'senha' => mysqli_real_escape_string($db->conn, $_POST['senha']),
//         'confirma_senha' => mysqli_real_escape_string($db->conn, $_POST['senha_confirma']),
//     ];
 
 
 
//     $senha = $_POST['senha'];
//     $senha_confirma = $_POST['senha_confirma'];
 
//     if ($senha <> $senha_confirma) {
//         echo "Senhas diferentes";
//         header("location: cadastro_usuario.php");
//     } else  if (($senha == $senha_confirma) and ($senha != "")) {
//         echo "tudo certo";
//         $usuario = new usuario;
//         $result = $usuario->criar($inputData);
//     } else if ($senha == " ") {
//         echo "ta vazio ze";
//         header("location: cadastro_usuario.php");
//         return false;
//     } else {
//         echo "para de ser burro'";
//         header("location: cadastro_usuario.php");
//         return false;
//     }
 
//     //print_r($result);
 
 
//     if ($result) {
//         $_SESSION['message'] = "Cadastro ok - bem vindo " . $_POST['nome'];
//         header("location: login_sup.php");
//         exit(0);
//     } else {
//         $_SESSION['message'] = "errou BB";
//         header("location: cadastro_usuario.php");
//         exit(0);
//     }
// } else {
//     $_SESSION['message'] = "Tu ta tentando acessar direto =)";
//     header("location: cadastro_usuario.php");
//     exit(0);
// }
// }else{
//  header("location: index.php");

// }