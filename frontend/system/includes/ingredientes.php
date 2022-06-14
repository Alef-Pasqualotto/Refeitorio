<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada ingrediente no banco, mostra uma checkbox com esses valores
foreach ($conn->query(" SELECT * FROM ingrediente WHERE inativo = 0" , PDO::FETCH_ASSOC) as $ingrediente){
        echo ('<div class="pesquisavel" ><input type="checkbox" value="' . $ingrediente['ingrediente_id'] . '"name=ingredientes[]>' . $ingrediente['nome'] . '</br></div>');
    }

?>