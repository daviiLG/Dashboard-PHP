<?php
// requere as informações de livro.php e inicia uyma sessao
require_once('../src/model/livro.php');
session_start();

// a variavel livro fará o papel da classe livro
$livro = new Livro();
// a variavel livros será ainda o livro, mas com a função de encontrar algum em especifico pelo seu id
$livros = $livro->findByID($_GET['id']);
// books será a variavel books, mas as informações são "convertidas" em arrays
$books = $livros->fetch_assoc();

// se a quantidade de livros cadastrados forem maior que 0...
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
  <?php include('nav-bar.php'); ?>

  <!-- pagina de edição de livro -->
  <div class="container mt-5">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h4>Edição de Livro <a href="/login/views/lista-livro.php" class="btn btn-primary float-end">Voltar</a></h4>

        </div>
        <div class="card-body">

        <!-- formulario pelo metodo post, na qual levará as informações para "acoes.php" e compará-las lá -->
        <form action="/login/config/acoes.php" method="POST">
            <div class="mb-3">
              <!-- na parte id, mostrará o id do livro que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>ID</label>
              <input type="text" name="id" class="form-control" value="<?= $books['id'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte titulo, mostrará o titulo do livro que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Titulo</label>
              <input type="text" name="nome" class="form-control" value="<?= $books['nome'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte autor, mostrará o autor do livro que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Autor</label>
              <input type="text" name="autor" class="form-control" value="<?= $books['autor'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte editora, mostrará a editora do livro que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Editora</label>
              <input type="text" name="editora" class="form-control" value="<?= $books['editora'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte ano, mostrará o ano do livro que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Ano</label>
              <input type="text" name="ano" class="form-control" value="<?= $books['ano'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte categoria, mostrará a categoria do livro que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Categoria</label>
              <input type="text" name="categoria" class="form-control" value="<?= $books['categoria'] ?>">
            </div>
            <div class="mb-3">
              <!-- botao para salvar as informações novas (ou não, se não foram alteradas), seu nome é "edita_livro" -->
              <button class="btn btn-primary" type="submit" name="edita_livro">Salvar</button>
            </div>
        </form>
        </div>

      </div>
    </div>
  </div>
  <!-- se a quantidade de livros for igual a 0, dirá que o livro não foi encontrado -->
<?php } else {echo "Livro não encontrado!";} ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>