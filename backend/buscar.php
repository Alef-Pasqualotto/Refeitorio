<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

$consulta = "SELECT * FROM";
$ingredientes = [];

// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio

switch ($_POST['tabela']) {
    case 1:
        $query = $conn->prepare(' SELECT item.descricao as 'nome_do_prato', CONCAT(CASE WHEN ingrediente_item.item_id = ingrediente_item.item_id THEN ingrediente.nome ELSE 0 END) as 'ingredientes', cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn,SUM(CASE WHEN ingrediente_item.item_id = ingrediente_item.item_id THEN calorias ELSE 0 END) as 'soma_das_calorias'
        from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
        INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
        INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
        WHERE cardapio.tipo = 3 GROUP BY nome_do_prato;');        
        $query->execute([
            ':tipo' => $dados['tipo']
        ]);
        echo '<pre>';
        var_dump($query->fetch());
        break;
        case 2:
            $query = $conn->prepare('SELECT ingrediente.nome, ingrediente.calorias, item.descricao, cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn 
            from cardapio_item INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id 
            INNER JOIN item on cardapio_item.item_id = item.item_id INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
            INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id 
            WHERE cardapio.dt = :dt GROUP BY item.descricao  ;');        
            echo '<pre>';
            $query->execute([
                ':dt' => $dados['dt']                          
            ]);
            var_dump($query->fetch());
            break;
        case 3:        
            $query = $conn->prepare(' SELECT ingrediente.nome, ingrediente.calorias, item.descricao, cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn from cardapio_item 
            INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id  
            INNER JOIN item on cardapio_item.item_id = item.item_id 
            INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
            INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id
            INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id
            WHERE ingrediente.nome = :nome ;');        
            $query->execute([
                ':nome' => $dados['nome']
            ]);
            break;
    }
?>
