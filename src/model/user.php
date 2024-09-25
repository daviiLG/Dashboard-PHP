<?php

require_once ('../config/conexao.php');

// classe do usuario, com as informações do id, nome, email e a senha
class User
{


  private int $id;
  private String $nome;
  private String $email;
  private String $password;



  

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of nome
   */ 
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Set the value of nome
   *
   * @return  self
   */ 
  public function setNome($nome)
  {
    $this->nome = $nome;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }
  

  // função para listar os usuarios
  function listUser(){
    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados. sql selecionará todos os usuarios, e
    // o return retornará o comando do sql
    $mysqli = new Conn();
    $sql = "SELECT * FROM usuario";
    return $mysqli->getConnection()->query($sql);
    
  }

  // função para encontrear um usuario de id especifico
  function findByID($id){
    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();
    // sql selecionara o usuario em que seu id no banco de dados é igual ao id
    $sql = "SELECT * FROM usuario WHERE id=" . $id;
    // retorna o comando de sql
    return $mysqli->getConnection()->query($sql);
  }

  // função para editar o usuario, com as informações de id, nome, email e senha
  function editarUser($id, $nome, $email, $senha){

    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();

    // prevenção de mysqli inject
    $nome = $mysqli->getConnection()->real_escape_string($nome);
    $email = $mysqli->getConnection()->real_escape_string($email);
    $senha = $mysqli->getConnection()->real_escape_string($senha);

    // atualiza os dados no banco de dados com os novos, retornando assim o comando com "return"
    if (!empty($senha)) {
      $senha = password_hash($senha, PASSWORD_DEFAULT);
      $sql = "UPDATE usuario SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = $id";
      return $mysqli->getConnection()->query($sql);
    }

    $sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = $id";
    return $mysqli->getConnection()->query($sql);
  }

  // função para deletar o usuario
  function deleteUser($id){
    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();
    // sql deletará o usuario em que seu id é o mesmo de id
    $sql = "DELETE FROM usuario WHERE id =" . $id;
    // retorna o comando
    return $mysqli->getConnection()->query($sql);
  }



  
}
