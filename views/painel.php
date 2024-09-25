<?php

// inclui o processo de proteção criado
include('../config/protect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>

  <!-- inclui a barra de navegação -->
  <?php include('nav-bar.php'); ?>

  <!-- requer as informações de livro.php -->
  <?php require_once('../src/model/livro.php');

  // variavel livro pela classe de livro
  $livro = new Livro;
  // variavel livros é o livro com a função de listagem de livro
  $livros = $livro->listBook();


  ?>
<!-- criação de container -->
  <div class="container">
    <div class="row">

    <!-- para cada livro cadastrado, criar um card com as informações do livro e com uma imagem -->
      <?php foreach ($livros as $livro) { ?>
        <div class="card col-md-3 m-5">
          <img class="img-thumbnail" width="200px" height="200px" src="data:image/jpeg;base64,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">
          <div class="card-body">
            <h5 class="card-title"><?= $livro['nome'] ?></h5><br>
            <p class="card-text">Autor: <?= $livro['autor'] ?></p>
            <p class="card-text">Editora: <?= $livro['editora'] ?></p>
            <p class="card-text">Ano de publicação: <?= $livro['ano'] ?></p>
            <p class="card-text">Categoria: <?= $livro['categoria'] ?></p>
            <!-- (não há nada no href pois não há nenhum luar que este botao possa levar pois não foi criado) -->
            <a href="#" class="btn btn-primary">Veja mais</a>
          </div>

        </div>
      <?php } ?>
    </div>
  </div>






  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>