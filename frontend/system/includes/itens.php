<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada ingrediente no banco, mostra uma checkbox com esses valores
foreach ($conn->query(" SELECT * FROM item", PDO::FETCH_ASSOC) as $item){
        echo ('<input type="checkbox" value="' . $item['item_id'] . '"name=itens[]>' . $item['descricao'] . '<br>');
    }

?>