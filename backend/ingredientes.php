<?php
include_once('conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada ingrediente no banco, mostra uma checkbox com esses valores
foreach ($conn->query(" SELECT * FROM ingrediente WHERE dt_exclusao IS NULL" , PDO::FETCH_ASSOC) as $ingrediente){
        echo ('<div class="pesquisavel">');
        echo !$aux ? '<input type="checkbox" value="' . $ingrediente['ingrediente_id'] . '"name=ingredientes[]> ' . $ingrediente['nome'] : $ingrediente['nome'] ;
        echo $aux ? ' <a class="link-danger" href=../backend/excluir.php?registro=1&ingrediente_id='. $ingrediente['ingrediente_id'] . '><i class="fa fa-trash" aria-hidden="true"></i></a>'  : null;
        echo ('</br></div>');
    }

?>