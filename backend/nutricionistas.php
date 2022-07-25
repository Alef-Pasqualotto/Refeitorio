<?php
include_once('conecta.php');


$banco = new Banco;
$conn = $banco->conectar();


// Para cada nutricionista no banco, mostra uma option com esses valores
foreach ($conn->query(" SELECT * FROM usuario WHERE crn IS NOT NULL AND crn != 0", PDO::FETCH_ASSOC) as $nutricionista){
        echo ('<option value="' . $nutricionista['usuario_id'] . '"' . ($nutricionista['usuario_id'] == $nutri_id ? ' selected ' : null) . '>' . $nutricionista['nome'] . '</option><br>');        
    }

?>