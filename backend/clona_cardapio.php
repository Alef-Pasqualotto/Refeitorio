<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
try{
    $conn = $banco->conectar();
} catch(PDOException $e){
    echo 'Falha ao salvar os arquivos. Favor, tente mais tarde.';
}

   /*  $query = $conn->prepare('SELECT GROUP_CONCAT(descricao), cardapio.dt, cardapio.tipo, nutricionista_id
    from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
    INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
    INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
    WHERE cardapio.dt = :dt and tipo = :tipo
    GROUP BY dt'); */
    $query = $conn->prepare('SELECT * from carpadio where dt = :dt');
    echo '<pre>';
    $query->execute([
    ':dt' => $dados['dt']
    ]);
    $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($query->fetchAll(PDO::FETCH_ASSOC));

    foreach ( $query->fetchAll(PDO::FETCH_ASSOC) as $registro){
        $query = $conn->prepare('INSERT INTO cardapio (tipo, dt, nutricionista_id) VALUES (:tipo, :dt, :nutricionista);');
                
        $query->execute([
            ':tipo' => $registro['tipo'], 
            ':nutricionista' => $registro['nutricionista_id'],
            ':dt' => $_POST['dt']
        ]);
    }

?>
    


?>