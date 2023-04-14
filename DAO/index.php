<?php

require_once("config.php");

//carrega um so usuario
// $root = new Usuario();
// $root->LoadById(2);
// echo $root;


//Carrega uma lista de usuários
$lista = Usuario::getList();
echo json_encode($lista);


// Carrega usuários buscando pelologin
// $busca = Usuario::search("d");
// echo json_encode($busca);


// //Carrega um usuário usando o login e senha
// $usuario = new Usuario();
// $usuario->login("daniel","123");
// // echo $usuario;



//Insert
// $aulono = new Usuario();
// $aulono->setDeslogin("aluno");
// $aulono->setDessenha("213");
// $aulono->insert();
// echo $aulono;



//Update
// $usuario = new Usuario();
// $usuario->LoadById(3);
// $usuario->update("Eduarda","123");
// echo $usuario;


// $usuario = new Usuario();
// $usuario->LoadById(0);
// $usuario->delete();
// echo $usuario;
?>