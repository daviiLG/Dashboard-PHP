<?php

// inclui a conexão com o banco de dados
include ('./config/conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
  // se algum dos campos não tiverem sido preenchidos, pedirá para o usuário responder

  if(strlen($_POST['email']) == 0){
    echo "Informe seu email";
  }else if(strlen($_POST['senha']) == 0){
    echo "Informe sua senha";
  }else{

    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();

    // se já foram, fará a prevenção do mysql injection
    $email = $mysqli->getConnection()->real_escape_string($_POST['email']);
    $senha =  $mysqli->getConnection()->real_escape_string($_POST['senha']);

    //compara os dados colocados com os dos usuários cadastrados no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $sql_query =  $mysqli->getConnection()->query($sql) or die;

    // variavel qtd guarda o numero de linhas que correspondem aos dados
    $qtd = $sql_query->num_rows;

    // se for igual a um, a sessão iniciará, fazendo assim o login
    if($qtd == 1){
      $usuario = $sql_query->fetch_assoc();
      
      if(!isset($_SESSION)){
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];
      $_SESSION['aula'] = 'Aula legal!';

      // leva o usuário ao painel
      header('Location: views/painel.php');

      // se for diferente de um, algo está errado, então é dito que o email ou a senha são inválidos
    }else{
      echo "Email ou senha inválidos.";
    }



  }


  

}
?>