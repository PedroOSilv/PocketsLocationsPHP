<?php
function buscaUsuario($conn, $email, $senha){
  $senhaMD5 = md5($senha);
  $query = "select * from usuarios
            where email = '{$email}' and senha = '{$senhaMD5}'";
  $resultado = mysqli_query($conn, $query);
  $usuario = mysqli_fetch_assoc($resultado);
  return $usuario;
}
function buscaEmail_user($conn, $email){
  $query = "select * from usuarios
            where email= '{$email}' ";
  $resultado = mysqli_query($conn, $query);
  $usuario = mysqli_fetch_assoc($resultado);
  return $usuario;
}

function insereUsuario($conn, $nome, $email, $senha, $tipo){
    $senhaMD5 = md5($senha);
    $query = "insert into usuarios (nome_usuario, email, senha, tipo) values ('{$nome}','{$email}','{$senhaMD5}','{$tipo}')";
    $resultado = mysqli_query($conn,$query);
    return $resultado;
}

function BuscaIdAdmin($conn, $id_usuario){
  $query = "select * from usuarios where usuarios.id_usuario= '{$id_usuario}'";
  $resultado = mysqli_query($conn, $query);
  $usuario = mysqli_fetch_assoc($resultado);
  return $usuario;
}

function listaAdmins($conn){
  $admins = array();
    $query = "select * from usuarios where usuarios.tipo = 'admin'";
    $resultado = mysqli_query($conn, $query);
    while ($admin = mysqli_fetch_assoc($resultado)){
      array_push($admins,$admin);
    }
    return $admins;
}

function listaUsers($conn){
  $admins = array();
    $query = "select * from usuarios";
    $resultado = mysqli_query($conn, $query);
    while ($admin = mysqli_fetch_assoc($resultado)){
      array_push($admins,$admin);
    }
    return $admins;
}


function BuscaSenhaUsuario($conn, $id_usuario){
	$query = "select senha from usuarios where id_usuario = {$id_usuario} ";
	$resultado = mysqli_query($conn, $query) or die (mysqli_error($conn));
	$resultado = mysqli_fetch_assoc($resultado);
	return $resultado;
}

function UpdateAdmin($conn, $nome, $email, $senha, $id_usuario){
  $id_usuario = (int)$id_usuario;
  $senhaMD5 = md5($senha);
  $senha_banco = BuscaSenhaUsuario($conn, $id_usuario);
  if ($senha == $senha_banco) {
    $query = "update usuarios SET   usuarios.nome_usuario = '{$nome}', usuarios.email = '{$email}' WHERE usuarios.id_usuario = {$id_usuario}";
      $resultado = mysqli_query($conn,$query) or die (mysqli_error($conn));
    return $resultado;
  }else{
    $query = "update usuarios SET   usuarios.nome_usuario = '{$nome}', usuarios.email = '{$email}', usuarios.senha = '{$senhaMD5}' WHERE usuarios.id_usuario = {$id_usuario}";
    $resultado = mysqli_query($conn,$query) or die (mysqli_error($conn));
    return $resultado;
  }
}

function UpdateUser($conn, $email, $senha){
  $senhaMD5 = md5($senha);
  $query = "update usuarios SET usuarios.senha = '{$senhaMD5}' WHERE usuarios.email = '{$email}'";
  $resultado = mysqli_query($conn,$query) or die (mysqli_error($conn));
  return $resultado;
}

function DeleteUser($conn, $id_usuario){
  $query = "delete from usuarios where id_usuario = {$id_usuario}";
  $resultado = mysqli_query($conn,$query) or die (mysqli_error($conn));
  return $resultado;
}