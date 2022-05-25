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

switch ($_POST['tabela']) {
    case 1:
        $query = $conn->prepare(' SELECT * from cardapio WHERE tipo = :tipo ;');        
        $query->execute([
            ':tipo' => $dados['tipo']
        ]);
        break;
        case 2:
            $query = $conn->prepare('SELECT * from cardapio INNER JOIN WHERE dt = :dt ;');        
            $query->execute([
                ':dt' => $dados['dt']                          
            ]);
            break;
        case 3:        
            $query = $conn->prepare('SELECT * from ingrediente WHERE nome = :nome;');        
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
