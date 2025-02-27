<?php
    require_once 'banco_pro.php';
    
    $nome=$_POST['txt_nome'];
    $descricao=$_POST['txt_descricao'];
    $preco=$_POST['txt_preco'];
    $categoria=$_POST['txt_categoria'];

    $id=$_GET['id'];

    if(isset($id)){
        excluirProdutos($id);
        header('Location: produtos.php');
    }
    
    inserirProdutos($nome, $descricao, $preco, $categoria);
    header('Location: produtos.php');
?>