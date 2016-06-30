<h3>OBS: Execute as fixtures a primeira vez para criar as tabelas no banco.</h3>
<a href="fixtures.php">Executar Fixtures</a>
<br><br><br>
<?php
require_once("conexao.php");

$arrayPessoas = [];
$arrayProfissoes = [];

$query1 = $conexao->query("SELECT * FROM pessoa"); // primeira query para pegar todas as pessoas

while ($pessoa = $query1->fetch(PDO::FETCH_OBJ)) {

    // segunda query para pegar todas as profissões da pessoa atual
    $query2 = $conexao->query("select distinct * from pessoa_profissao a inner join profissao b ON a.profissao_id=b.id where pessoa_id = " . $pessoa->id);

    // coloca todas as profissões da pessoa atual em um array, onde a key é o id da profissão e o value é o nome da profissão
    while ($profissao = $query2->fetch(PDO::FETCH_OBJ)) {
        $arrayProfissoes[$profissao->id] = $profissao->profissao;
    }

    // adiciona um item no array, onde a key é o id da pessoa atual, o nome é o nome da pessoa e a profissao é um array com todas as profissões da pessoa atual
    $arrayPessoas[$pessoa->id] = [
        'nome' => $pessoa->pessoa,
        'profissão' => $arrayProfissoes
    ];
    $arrayProfissoes = [];  // zera array de profissões
}

print_r($arrayPessoas);