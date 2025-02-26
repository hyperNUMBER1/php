<?php
function conectar() {
    $mysqli = new mysqli("localhost", "root", "", "lojaindustrial");    
    if ($mysqli->connect_error) {
        die("Falha: ".$mysqli->connect_error);
    }    
    return $mysqli;
}



function inserirCategoria($nome, $descricao) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
        INSERT INTO tb_categorias 
        (nome, descricao) 
        VALUES (?, ?)
    ");
    $stmt->bind_param("ss", $nome, $descricao);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}

function excluirCategoria($id) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
    DELETE FROM tb_categorias WHERE id = ?");
    $stmt->bind_param("i", $id);    
    $stmt->execute();   
    $stmt->close();
    $mysqli->close();
}

function listarCategorias() {
    $mysqli = conectar();
    $sql = "SELECT id, nome, descricao 
    FROM tb_categorias";
    $result = $mysqli->query($sql);
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $mysqli->close();
    return $categorias;
}
?>