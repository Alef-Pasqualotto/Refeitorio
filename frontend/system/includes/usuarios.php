<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();


// Para cada nutricionista no banco, mostra uma option com esses valores
foreach ($conn->query(" SELECT * FROM usuario", PDO::FETCH_ASSOC) as $usuario){
        echo ('<option value="' . $usuario['usuario_id'] . '"' . ($usuario['usuario_id'] == $usua_id ? ' selected ' : null)
         . '>' . $usuario['nome'] . '</option><br>');        
    }

