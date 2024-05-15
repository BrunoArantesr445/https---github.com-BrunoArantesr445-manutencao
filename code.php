<?php
session_start();
include('banco.php');
include('class.php');
$db = new banco;

// echo "<pre>";
// print_r($_POST); 
 
if (isset($_POST['salva_usuario'])) {
    $inputData = [
        'nome' => mysqli_real_escape_string($db->conn, $_POST['nome']),
        'login' => mysqli_real_escape_string($db->conn, $_POST['login']),
        'senha' => mysqli_real_escape_string($db->conn, $_POST['senha']),
    ];
 
    $usuario = new usuario;
    $result = $usuario->criar($inputData);
 
 //print_r($result);
 
 
   if($result){
    $_SESSION['message'] = "Cadastro ok - bem vindo ".$_POST['nome'];
    header("location: cadastro_usuario.php");
    exit(0);
 
   }else{
    $_SESSION['message'] = "errou BB";
    header("location: cadastro_usuario.php");
    exit(0);
 
   }
 
 
}else{
    $_SESSION['message'] = "Tu ta tentando acessar direto =)";
    header("location: cadastro_usuario.php");
    exit(0);
}
?>