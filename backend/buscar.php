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

/* switch ($_POST['tabela']){
    
    case 1:
        $consulta = $consulta . ' ingrediente';
        break;
    case 2:
        $consulta = $consulta . ' item';
        break;
    case 3:
        $consulta = $consulta . ' cardapio'. 'where dt = ';
        break;
} */

/* Permitir que o usuário troque de semana;
Permitir que o usuário pesquise por um tipo de refeição;
Permitir que o usuário pesquise por uma data específica;
Permitir que o usuário pesquise por um item específico; */

//mostrar descrição e calorias - ingredientes
//mostrar descrição - item
//mostrar data e tipo - cardápio
//mostrar nome e crn - nutricionista 

/* SELECT ingrediente.nome, ingrediente.calorias, item.descricao, cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn from cardapio_item 
        INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id  
        INNER JOIN item on cardapio_item.item_id = item.item_id 
        INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
        INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id
        INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id
        WHERE item.descricao = "muito bom"; */

switch ($_POST['tabela']) {
    case 1:
        $query = $conn->prepare(' SELECT ingrediente.nome, ingrediente.calorias, item.descricao, cardapio.dt, cardapio.tipo, usuario.nome, usuario.crn from cardapio_item 
        INNER JOIN cardapio ON cardapio_item.cardapio_id = cardapio.cardapio_id  
        INNER JOIN item on cardapio_item.item_id = item.item_id 
        INNER JOIN ingrediente_item on item.item_id = ingrediente_item.item_id 
        INNER JOIN ingrediente on ingrediente_item.ingrediente_id = ingrediente.ingrediente_id
        INNER JOIN usuario on cardapio.nutricionista_id = usuario.usuario_id
        WHERE cardapio.tipo = 1 ;');        
        $query->execute([
            ':tipo' => $dados['cardapio.tipo']
        ]);
        break;
        case 2:
            $query = $conn->prepare('SELECT * from cardapio INNER WHERE dt = :dt ;');        
            $query->execute([
                ':dt' => $dados['dt']                          
            ]);
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


/* foreach ($conn->query("
        $consulta
        ", PDO::FETCH_ASSOC) as $ingrediente){
        $ingredientes[] = [
            "id" => $ingrediente['ingrediente_id'],
            "nome" => $ingrediente['nome'],
                "calorias" => $ingrediente['calorias']           
        ];
    }
    print json_encode($ingredientes); */
?>
