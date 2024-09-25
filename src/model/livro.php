<?php
require_once ('../config/conexao.php');

// criação da classe livro, com as informações de seu id, titulo, autor, editora, ano e categoria
class Livro
{

  private int $id;
  private String $titulo;
  private String $autor;
  private String $editora;
  private int $ano;
  private String $categoria;

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
   * Get the value of titulo
   */ 
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Set the value of titulo
   *
   * @return  self
   */ 
  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;

    return $this;
  }

  /**
   * Get the value of autor
   */ 
  public function getAutor()
  {
    return $this->autor;
  }

  /**
   * Set the value of autor
   *
   * @return  self
   */ 
  public function setAutor($autor)
  {
    $this->autor = $autor;

    return $this;
  }

  /**
   * Get the value of editora
   */ 
  public function getEditora()
  {
    return $this->editora;
  }

  /**
   * Set the value of editora
   *
   * @return  self
   */ 
  public function setEditora($editora)
  {
    $this->editora = $editora;

    return $this;
  }

  /**
   * Get the value of ano
   */ 
  public function getAno()
  {
    return $this->ano;
  }

  /**
   * Set the value of ano
   *
   * @return  self
   */ 
  public function setAno($ano)
  {
    $this->ano = $ano;

    return $this;
  }

  /**
   * Get the value of categoria
   */ 
  public function getCategoria()
  {
    return $this->categoria;
  }

  /**
   * Set the value of categoria
   *
   * @return  self
   */ 
  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;

    return $this;
  }


  // função para listar os livros cadastrados
  function listBook(){
    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();

    // sql seleciona todos os livros
    $sql = "SELECT * FROM produto";
    // retorna o comando de sql
    return $mysqli->getConnection()->query($sql);
    
  }

  // função para encontrar um livro especifico pelo seu id
  function findByID($id){
    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();
    // sql seleciona o livro em que seu id é igual a id
    $sql = "SELECT * FROM produto WHERE id=" . $id;

    // retorna o comando de sql
    return $mysqli->getConnection()->query($sql);
  }

  // função para editar o livro, com as informações de id,titulo, autor, editora, ano e categoria
  function editarUser($id, $titulo, $autor, $editora, $ano, $categoria){

    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();

    // prevenção de mysqli inject
    $titulo = $mysqli->getConnection()->real_escape_string($titulo);
    $autor = $mysqli->getConnection()->real_escape_string($autor);
    $editora = $mysqli->getConnection()->real_escape_string($editora);
    $ano = $mysqli->getConnection()->real_escape_string($ano);
    $categoria = $mysqli->getConnection()->real_escape_string($categoria);

    // atualiza as informações no banco de dados pelos novos dados alterados
      $sql = "UPDATE produto SET nome = '$titulo', autor = '$autor', editora = '$editora', ano = '$ano', categoria = '$categoria' WHERE id = $id";
      // retorna o comando sql
      return $mysqli->getConnection()->query($sql);    
}

// função para deletar o livro
  function deleteLivro($id){

    // $mysqli será uma variavel que guardará a classe de conexão com o banco de dados
    $mysqli = new Conn();

    // sql deletará o livro em que seu id é igual ao id
    $sql = "DELETE FROM produto WHERE id =" . $id;
    // retorna o sql
    return $mysqli->getConnection()->query($sql);
}
}