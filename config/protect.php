<?php

// se a sessão existe (ou seja, o usuário já logou), não acontecerá nada e o código incluído prosseguirá normalmente
if(!isset($_SESSION)){
  session_start();
}

// caso não exista, parará o código e dirá que o usuário não pode acessar a página sem estar logado
if(!isset($_SESSION['id'])){
  die("Você não pode acessar essa página sem estar logado!");
}