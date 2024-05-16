<?php
session_start();
include('banco.php');
include('class.php');
$db = new banco;

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


if (isset($_SESSION['username'])) {
 


if (isset($_POST['salva_produto'])) {


     if (isset($_FILES['foto'])) {  // compara se existe a variável
        $foto[] = $_FILES['foto'];
        if ($foto[0]['error'] < 1) {
          $f_nome = $foto[0]['name'];
          $f_ext = $foto[0]['type'];
          $f_caminho = $foto[0]['tmp_name'];
          $foto = file_get_contents($f_caminho);
          $foto = 'data:' . $f_ext . ';base64,' . base64_encode($foto);
        //  echo "tem foto";

        }else{
           // echo "nao tem foto";   
            $foto = "";   
        } 
    }
    $lista = [
        'produto' => mysqli_real_escape_string($db->conn, $_POST['produto']),
        'valor' => mysqli_real_escape_string($db->conn, $_POST['valor']),
        'imagem' => mysqli_real_escape_string($db->conn, $_POST['imagem']),
        'quantidade' => mysqli_real_escape_string($db->conn, $_POST['quantidade']),            
    ];

    $produto = new produto;
    $retorno = $produto->cadastrar($lista);

 //print_r($result);


   if($retorno){
    $_SESSION['message'] = ": ".$_POST['produto']." - Cadastrado com sucesso!";
    header("location: busca_produto.php?a=1");
    exit(0);

   }else{
    $_SESSION['message'] = "- Não cadastrado!";
    header("location: cadastro_produto.php");
    exit(0);

   }


}else{
    $_SESSION['message'] = "Tu ta tentando acessar direto =)";
    header("location: cadastro_produto.php");
    exit(0);
}
}else{
  header("location: index.php");
}
?> 