<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada ingrediente no banco, mostra uma checkbox com esses valores
foreach ($conn->query(" SELECT * FROM ingrediente", PDO::FETCH_ASSOC) as $ingrediente){
        echo ('<input type="checkbox" value="' . $ingrediente['ingrediente_id'] . '"name=ingredientes[]>' . $ingrediente['nome'] . '<br>');
    }

?>