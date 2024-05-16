<?php
session_start();
include('banco.php');
include('class.php');
$db = new banco;


if (isset($_POST['atualiza_usuario'])) {
    $inputData = [
        'nome' => mysqli_real_escape_string($db->conn, $_POST['nome']),
        'id' => mysqli_real_escape_string($db->conn, $_POST['id']),
        'login' => mysqli_real_escape_string($db->conn, $_POST['login']),
        'senha' => mysqli_real_escape_string($db->conn, $_POST['senha']),
    ];


$acao = 1;

$usuario = new usuario;
$comando = $usuario->editar_usuario($inputData,$acao);


if ($comando > 0) {
    $texto = "<span style='color:red'>-- POO___".$_POST['nome']."</span>";
    $_SESSION['message'] = "Atualizado  ".$texto;
    header("Location: busca_usuario.php");
    exit(0);
} else {
    $_SESSION['message'] = "Não atualizado =)";
    header("Location: busca_usuario.php");
    exit(0);
}

}



?>
