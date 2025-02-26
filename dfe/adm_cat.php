<?php
    require_once 'banco.php';

    $nome=$_POST['txt_nome'];
    $descricao=$_POST['txt_descricao'];
    
    inserirCategoria($nome, $descricao);
    header('Location: categorias.php');
?>