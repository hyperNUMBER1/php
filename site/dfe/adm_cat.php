<?php
    require_once 'banco.php';

    $nome=$_POST['txt_nome'];
    $descricao=$_POST['txt_descricao'];

    $id=$_GET['id'];

    if(isset($id)){
        excluirCategoria($id);
        header('Location: categorias.php');
    }
    
    inserirCategoria($nome, $descricao);
    header('Location: categorias.php');
?>