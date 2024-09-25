<?php

// inclui o processo de comparação de dados em login.php
include('./src/model/login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<!-- Página de login -->
<body class="bg-dark p-2 text-dark bg-opacity-75">

  <div class="position-absolute top-50 start-50 translate-middle w-25 bg-dark bg-opacity-50 rounded-5">
    <div class="border border-dark bg-opacity-50 p-4 rounded-5" style="height: 400px;">
      <h1 class="text-light pb-2 border-bottom border-light fst-italic text-center">Página de login</h1>

      <!-- "formulário" pelo metodo post em que guarda as informações dadas e depois joga pro login.php -->
      <form action="" method="POST" class="w-100">
        <div class="mb-4"> <br>
          <label for="email" class="form-label text-light fs-5 text-opacity-75">E-mail</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-4">
          <label for="senha" class="form-label text-light fs-5 text-opacity-75">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control"> <br>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="p-2 text-light bg-light bg-opacity-10 border border-light rounded-2 w-75">Entrar</button>
        </div>
      </form>

    </div>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>