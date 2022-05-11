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

function findByPk($id){
    $db = new PDO("mysql:host=localhost;dbname=pw3", "root", "");
    $consulta = $db->prepare("SELECT * FROM :tabela WHERE id=:id");
    $consulta->execute([':id' => $id]);
    $consulta->setFetchMode(PDO::FETCH_CLASS, 'Pessoa');
    return $consulta->fetch();
}

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

function remover(){
    try {
        $db = new PDO("mysql:host=localhost;dbname=pw3", "root", "");
        $consulta = $db->prepare("DELETE FROM pessoas WHERE id= :id");
        $consulta->execute([':id' => $this->id]);
    }catch(PDOException $e){
        die($e->getMessage());
    }

$p = Pessoa::findByPk($id);
if (!$p) throw new Exception("Usuário não encontrado!");
$p->remover();
print $p;


?>