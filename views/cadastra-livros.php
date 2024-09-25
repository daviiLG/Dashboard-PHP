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

  <!-- pagina de cadastro do livro -->
  <div class="container mt-5">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h4>Cadastro de livro <a href="lista-livro.php" class="btn btn-primary float-end">Voltar</a></h4>

  <!-- formulario pelo metodo post, na qual levará as informações para "acoes.php" e compará-las lá -->
        </div>
        <div class="card-body">
          <form action="../config/acoes.php" method="POST">
            <div class="mb-3">
                <!-- guarda as informações de titulo -->
              <label>Titulo</label>
              <input type="text" name="nome" class="form-control">
            </div>
            <div class="mb-3">
                <!-- guarda as informações de autor -->
              <label>Autor</label>
              <input type="text" name="autor" class="form-control">
            </div>
            <div class="mb-3">
                <!-- guarda as informações de editora -->
              <label>Editora</label>
              <input type="text" name="editora" class="form-control">
            </div>
            <div class="mb-3">
                <!-- guarda as informações de ano -->
              <label>Ano</label>
              <input type="text" name="ano" class="form-control">
            </div>
            <div class="mb-3">
                <!-- guarda as informações de categoria -->
              <label>Categoria</label>
              <input type="text" name="categoria" class="form-control">
            </div>
            <div class="mb-3">
                <!-- botao de cadastrar o livro, com seu nome sendo "cadastra_livro" -->
              <button class="btn btn-primary" type="submit" name="cadastra_livros">Publicar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>