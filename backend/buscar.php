<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

switch ($pesquisa) {
    // case 1: //selecionar por tipo ex:1 ,2 ,3  
    //     $query = $conn->prepare(' SELECT item.descricao as nome_do_prato, GROUP_CONCAT(ingrediente.nome) 
    //     as ingredientes, cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn,
    //     SUM(CASE WHEN ingrediente_item.item_id = ingrediente_item.item_id THEN calorias ELSE 0 END) as soma_das_calorias 
    //     from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
    //     INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
    //     INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
    //     WHERE cardapio.tipo = :tipo GROUP BY nome_do_prato');
    //     $query->execute([
    //         ':tipo' => $dados['tipo']
    //     ]);
    //     echo '<pre>';
    //     var_dump($query->fetch(PDO::FETCH_ASSOC));
    //     break;
    case 1: //selecionar sem data específica
        $query = $conn->query('SELECT item.descricao as nome_do_prato, GROUP_CONCAT(ingrediente.nome SEPARATOR ", ") 
            as ingredientes, cardapio.dt, (CASE WHEN cardapio.tipo = 1 THEN "Café da Manhã" WHEN cardapio.tipo = 2 THEN "Almoço" WHEN cardapio.tipo = 3 THEN "Janta" END) as tipo, usuario.nome, usuario.crn,
            SUM(CASE WHEN ingrediente_item.item_id = ingrediente_item.item_id THEN calorias ELSE 0 END) as soma_das_calorias 
            from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
            INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
            INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
            GROUP BY dt, nome_do_prato, tipo ;');        
        return $query->fetchAll(PDO::FETCH_ASSOC);
        break;


    case 2: //selecionar por data ex:0000-00-00
        $query = $conn->prepare('SELECT item.descricao as nome_do_prato, GROUP_CONCAT(ingrediente.nome SEPARATOR ", ") 
            as ingredientes, cardapio.dt, (CASE WHEN cardapio.tipo = 1 THEN "Café da Manhã" WHEN cardapio.tipo = 2 THEN "Almoço" WHEN cardapio.tipo = 3 THEN "Janta" END) as tipo, usuario.nome, usuario.crn,
            SUM(CASE WHEN ingrediente_item.item_id = ingrediente_item.item_id THEN calorias ELSE 0 END) as soma_das_calorias 
            from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
            INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
            INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
            WHERE week(dt) = week(:dt) GROUP BY dt, nome_do_prato, tipo ;');
        echo '<pre>';
        $query->execute([
            ':dt' => $data
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
        break;
    // case 3: //selecionar por nome. Ex: Cebola 
    //     $query = $conn->prepare(" SELECT item.descricao as nome_do_prato, GROUP_CONCAT(ingrediente.nome) 
    //         as ingredientes, cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn,
    //         SUM(CASE WHEN ingrediente_item.item_id = ingrediente_item.item_id THEN calorias ELSE 0 END) as soma_das_calorias 
    //         from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
    //         INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
    //         INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
    //         WHERE item.descricao LIKE '%" . $dados['descricao'] . "%' ; ");
    //     echo '<pre>';
    //     $query->execute([
    //         ':descricao' => $dados['descricao']
    //     ]);
    //     var_dump($query->fetch(PDO::FETCH_ASSOC));
    //     break;
        
}
