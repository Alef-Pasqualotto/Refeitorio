<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada nutricionista no banco, mostra uma option com esses valores
foreach ($conn->query(" SELECT * FROM usuario WHERE crn IS NOT NULL", PDO::FETCH_ASSOC) as $nutricionista){
        echo ('<option value="' . $nutricionista['usuario_id'] . '">' . $nutricionista['nome'] . '</option><br>');        
    }

?>