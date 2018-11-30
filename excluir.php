<?php
    require_once 'config/pessoa.php';

    $crud = new Pessoa(); 
    $crud->excluir($_GET['id']); 

    header("Location: index.php"); 
?>
