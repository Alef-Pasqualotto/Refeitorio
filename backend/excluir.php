<?php
include_once('banco.php');
$id = $_GET['id'];
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio

switch ($_GET['tabela']) {
    case 1:
        $tabela = "ingrediente";
        break;
    case 2:
        $tabela = "item";
        break;
    case 3:
        $tabela = 'usuario';
        break;
    case 4:
        $tabela = 'cardapio';
        break;
}

function findByPk($id){
    $db = new PDO("mysql:host=localhost;dbname=refeicoes", "root", "");
    $consulta = $db->prepare("SELECT * FROM :tabela WHERE id=:id");
    $consulta->execute([':id' => $id, ':tabela' => $tabela]);
    return $consulta;
}

function remover(){
    try {
        $db = new PDO("mysql:host=localhost;dbname=refeicoes", "root", "");
        $consulta = $db->prepare("DELETE FROM :tabela WHERE id= :id");
        $consulta->execute([':id' => $id, ':tabela' => $tabela]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

$item = findByPk($id);
if (!$item) throw new Exception("item da tabela não encontrado!");
$item->remover();
print $item;

?>