<?php
function conectar() {
    $mysqli = new mysqli("localhost", "root", "", "lojaindustrial");    
    if ($mysqli->connect_error) {
        die("Falha: ".$mysqli->connect_error);
    }    
    return $mysqli;
}



function inserirProdutos($nome, $descricao, $preco, $categoria) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
        INSERT INTO tb_produtos 
        (nome, descricao, preco, id_categoria) 
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("ssdd", $nome, $descricao, $preco, $categoria);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}

function excluirProdutos($id) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
    DELETE FROM tb_produtos WHERE id = ?");
    $stmt->bind_param("i", $id);    
    $stmt->execute();   
    $stmt->close();
    $mysqli->close();
}

function listarProdutos() {
    $mysqli = conectar();
    $sql = "SELECT id, nome, descricao, preco, id_categoria
    FROM tb_produtos";
    $result = $mysqli->query($sql);
    $produtos = [];
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
    $mysqli->close();
    return $produtos;
}
?>