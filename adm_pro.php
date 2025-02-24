<?php
    $nome=$_POST['txt_nome'];
    $descricao=$_POST['txt_descricao'];
    $preco=$_POST['txt_preco'];
    $categoria=$_POST['txt_categoria'];
    echo("Nome:" .$nome);
echo("<BR>");
    echo("Descrição do produto:" .$descricao);
echo("<BR>");
    echo("Preço:" .$preco);
echo("<BR>");
    echo("Categoria:" .$categoria);

?>