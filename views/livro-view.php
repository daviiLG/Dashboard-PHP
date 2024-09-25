<?php
// requere as informações de livro.php
require_once('../src/model/livro.php');
// inicia a sessao
session_start();
// a variavel livro fará o papel da classe livro
$livro = new Livro();
// a variavel livros será ainda o livro, mas com a função de encontrar algum em especifico pelo seu id
$livros = $livro->findByID($_GET['id']);
// books será a variavel books, mas as informações são "convertidas" em arrays
$books = $livros->fetch_assoc();

// se a quantidade de livros forem maior que 0...
if ($livros->num_rows > 0) {

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!-- inclui a barra de pesquisa -->
  <?php include('nav-bar.php'); ?>

  <!-- pagina da lista do livro -->
  <div class="container mt-5">
    <div class="row">
      <div class="card">
        <div class="card-header"> 
          <!-- href para servir como um botao para voltar a "lista-livro.php" -->
          <h4>Livro Cadastrado: <a href="/login/views/lista-livro.php" class="btn btn-primary float-end">Voltar</a></h4>

        </div>
        <div class="card-body">

          
            <div class="mb-3">
              <!-- mostra o dado de id -->
              <label>ID</label>
              <p><?php echo $books['id'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de nome -->
              <label>Nome</label>
              <p><?php echo $books['nome'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de autor -->
              <label>Autor</label>
              <p><?php echo $books['autor'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de editora -->
              <label>Editora</label>
              <p><?php echo $books['editora'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de ano -->
              <label>Ano</label>
              <p><?php echo $books['ano'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de categoria -->
              <label>Categoria</label>
              <p><?php echo $books['categoria'] ?></p>
            </div>

        </div>

      </div>
    </div>
  </div>
  <!-- se for igual a 0, dirá que o livro nao foi encontrado -->
<?php } else {echo "Livro não encontrado!";} ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>