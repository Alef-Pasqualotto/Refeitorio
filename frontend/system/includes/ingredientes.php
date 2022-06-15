<?php
include_once(__DIR__ . '..\..\..\..\backend\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada ingrediente no banco, mostra uma checkbox com esses valores
foreach ($conn->query(" SELECT * FROM ingrediente WHERE dt_exclusao IS NULL" , PDO::FETCH_ASSOC) as $ingrediente){
        echo ('<div class="pesquisavel"><input type="checkbox" value="' . $ingrediente['ingrediente_id'] . '"name=ingredientes[]>' . $ingrediente['nome']);
        echo $aux ? '<a href=../../backend/excluir.php?registro=2&item_id='. $ingrediente['ingrediente_id'] . '> Excluir</a>'  : '>';
        echo ('</br></div>');
    }

?>