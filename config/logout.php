<?php

// a sessão inicada será destruída, e o usuário será levado de volta à página de login
if(!isset($_SESSION)){
  session_start();
}

session_destroy();
header("Location: ../index.php");