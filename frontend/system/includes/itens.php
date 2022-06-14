<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada item no banco, mostra uma checkbox com esses valores
foreach ($conn->query("SELECT ITEM.*, (SELECT COUNT(*) FROM CARDAPIO_ITEM WHERE cardapio_item.cardapio_id = $cardapio_id AND cardapio_item.item_id = item.item_id) AS checkado FROM ITEM", PDO::FETCH_ASSOC) as $item){
        echo ('<input type="checkbox"' . ($item['checkado'] > 0 ? ' checked ' : ' ') . 'value="' . $item['item_id'] . '"name=itens[]> ' . $item['descricao'] . '<br>');
    }

?>