<?php

// classe de conexão, criando variaveis com os dados correspondetes ao do banco de dados
class Conn
{
  private $usuario = 'root';
  private $senha = '';
  private $database = 'login';
  private $host = 'localhost';

  // função para estabelecer a conexão em si
  public function getConnection()
  { 
    try {
      // a variavel mysqli representa a conexão entre o php e o banco de dados
      $mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->database);
      return $mysqli;
    } catch (Exception $e) {
      // se por algum motivo der erro, dirá que deu errado
      echo "Desculpa, erro interno, verifique o banco de dados!<br>";
      exit();
    }
  }
}

?>
