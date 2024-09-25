<?php
// inclui estes outros arquivos, pois pegaremos informações deles 
include('conexao.php');
include('../src/model/user.php');
include ('../src/model/livro.php');

if (isset($_POST['cadastra_usuario'])) {

  // se algum dos dados não foram preenchidos, pedirá para preencher o campo não respondido
  if (strlen($_POST['email']) == 0) {
    echo "Informe seu email";
  } else if (strlen($_POST['senha']) == 0) {
    echo "Informe seu senha";
  } else if (strlen($_POST['nome']) == 0) {
    echo "Informe seu nome";
  } else {

    // prevenção de mysql injection
    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn;
    $nome = $mysqli->getConnection()->real_escape_string($_POST['nome']);
    $email = $mysqli->getConnection()->real_escape_string($_POST['email']);
    $senha = $mysqli->getConnection()->real_escape_string($_POST['senha']);
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    // cadastra os dados do usuario no banco de dados
    $sql = "INSERT INTO usuario(nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    $mysqli->getConnection()->query($sql);

    // retorna ao painel
    header('Location: ../views/painel.php');
  }
}

if (isset($_POST['cadastra_livros'])) {

  // se algum dos dados não foram preenchidos, pedirá para preencher o campo não respondido
  if (strlen($_POST['nome']) == 0) {
    echo "Informe o nome do seu livro";
  } else if (strlen($_POST['autor']) == 0) {
    echo "Informe o autor do seu livro";
  } else if (strlen($_POST['editora']) == 0) {
    echo "Informe a editora do seu livro";
  } else if (strlen($_POST['ano']) == 0) {
    echo "Informe o ano de publicação do seu livro";
  } else if (strlen($_POST['categoria']) == 0) {
    echo "Informe a categoria do seu livro";
  } else {

    // prevenção de mysql injection
    $mysqli = new Conn();
    $nome = $mysqli->getConnection()->real_escape_string($_POST['nome']);
    $autor = $mysqli->getConnection()->real_escape_string($_POST['autor']);
    $editora = $mysqli->getConnection()->real_escape_string($_POST['editora']);
    $ano = $mysqli->getConnection()->real_escape_string($_POST['ano']);
    $categoria = $mysqli->getConnection()->real_escape_string($_POST['categoria']);

    // cadastra os dados do livro no banco de dados
    $sql = "INSERT INTO produto(nome, autor, editora, ano, categoria) VALUES ('$nome', '$autor', '$editora', '$ano', '$categoria')";

    $mysqli->getConnection()->query($sql);

    // retorna ao painel
    header('Location: ../views/painel.php');
  }
}  


if (isset($_POST['edita_usuario'])) {

  // user será uma variavel pela classe user (criada em user.php)
    $user = new User;
    // "result" chamará a função criada para editar o usuario
    $result = $user->editarUser($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);
  
    // se for executado com sucesso, dirá que foi editado e retornará para a lsita de usuarios
      if ($result == 1) {
        echo "Usuário editado com sucesso.";
        header('Location: ../views/lista-usuario.php');
  
        // se não, dirá que nao foi editado e levará o usuario para a lista de usuarios
      }else{
        echo "Usuário não foi editado.";
        header('Location: ../views/lista-usuario.php');
      }
    }  

if (isset($_POST['edita_livro'])){

  // livro será uma variavel pela classe livro (criada em livro.php)
    $livro = new Livro;
    // "result" chamará a função criada para editar o livro
    $result = $livro->editarUser($_POST['id'], $_POST['nome'], $_POST['autor'], $_POST['editora'], $_POST['ano'], $_POST['categoria']);

    // se foi executada com sucesso, dirá que o livro foi editado e retornará a lista de livros
      if ($result == 1) {
        echo "Livro editado com sucesso.";
        header('Location: ../views/lista-livro.php');

        // se nao, dirá que não foi editado e também retornará para a lista de livros
      }else{
        echo "Livro não foi editado.";
        header('Location: ../views/lista-livro.php');
    }
  }


if (isset($_POST['deleta_usuario'])) {

  // user será uma variavel pela classe user
  $user = new User;
  // result chamará a função de deletar usuario
  $result = $user->deleteUser($_POST['deleta_usuario']);

  // se for executada com sucesso, dirá que o usuario foi deletado e retornará para a lista de usuarios
    if ($result == 1) {
      echo "Usuário deletado com sucesso.";
      header('Location: ../views/lista-usuario.php');

      // se nao, dira que o usuario nao foi deletado e retornará tambem para a lista de usuarios
    }else{
      echo "Usuário não foi deletado.";
      header('Location: ../views/lista-usuario.php');
    }
  }
  

if (isset($_POST['deleta_livro'])) {

  // livro ser uma variavel pela classe livro
  $livro = new Livro;
  // result chamará a função de deletar livro
  $result = $livro->deleteLivro($_POST['deleta_livro']);

  // se for executada com sucesso, dirá que o livro foi deletado com sucesso e retornará para a lista de livros
    if ($result == 1) {
      echo "Livro deletado com sucesso.";
      header('Location: ../views/lista-livro.php');

      // se nao, dirá que o livro nao foi deletado e tambem retornará para a lista de livros
    }else{
      echo "Livro não foi deletado.";
      header('Location: ../views/lista-livro.php');
    }
  }    

?>
