<?php
  include_once "../config/dbconnection.php";
  include_once "banco-usuario.php";
  include_once "logica-usuario.php";
  $email = $_POST["email"];
  $senha = $_POST["password"];
  $usuario = buscaUsuario($conn, $email, $senha);

  if ($usuario == null){
    //manda requisição post e redireciona para a pagina de login
  
    header("Location: /PocketsLocationsPHP/addpockets");
  }else{
    logaUsuario($usuario["email"]);
    header("Location: /PocketsLocationsPHP/addpockets");
  }
?>
