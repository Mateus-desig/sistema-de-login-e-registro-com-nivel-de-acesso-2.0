<?php
  if(isset($_GET['acao']) && $_GET['acao'] == 'sair'){
    session_start();
    session_destroy();
    header("Location: index.php");exit;
  }