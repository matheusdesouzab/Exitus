 <?php

$idadeMulheres = $matriculaServicos->idadeAlunos('Feminino');
$idadeHomens = $matriculaServicos->idadeAlunos('Masculino');

$qtdAlunos = $matriculaServicos->totalAluno();
$qtdAlunos = (array_values($qtdAlunos)[0]);

$novaidadeMulheres = array_map(function ($valor) {
    return $valor['data_nascimento'];
}, $idadeMulheres);

$novaidadeHomens = array_map(function ($valor) {
    return $valor['data_nascimento'];
}, $idadeHomens);

for ($x = 0; $x < count($novaidadeMulheres); $x++) {
    $matricula = new Matricula();
    $novaidadeMulheres[$x] = $matricula->calcularIdade($novaidadeMulheres[$x]);
}

for ($x = 0; $x < count($novaidadeHomens); $x++) {
    $matricula2 = new Matricula();
    $novaidadeHomens[$x] = $matricula2->calcularIdade($novaidadeHomens[$x]);
}

$idade14a18anosMulheres = null;
$idade19a25anosMulheres = null;
$idade26a30anosMulheres = null;
$idade31a40anosMulheres = null;
$idade41anosMulheres = null;

for ($x = 0; $x < count($novaidadeMulheres); $x++) {
    
    if ($novaidadeMulheres[$x] >= 14 && $novaidadeMulheres[$x] <= 18) {
        $idade14a18anosMulheres++;
    } else if ($novaidadeMulheres[$x] >= 19 && $novaidadeMulheres[$x] <= 25) {
        $idade19a25anosMulheres++;
    } else if ($novaidadeMulheres[$x] >= 26 && $novaidadeMulheres[$x] <= 30) {
        $idade26a30anosMulheres++;
    } else if ($novaidadeMulheres[$x] >= 31 && $novaidadeMulheres[$x] <= 40) {
        $idade31a40anosMulheres++;
    } else if ($novaidadeMulheres[$x] >= 41) {
        $idade41anosMulheres++;
    }
}



$idade14a18anosMulheres = floor(($idade14a18anosMulheres * 100) / count($novaidadeMulheres));
$idade19a25anosMulheres = floor(($idade19a25anosMulheres * 100) / count($novaidadeMulheres));
$idade26a30anosMulheres = floor(($idade26a30anosMulheres * 100) / count($novaidadeMulheres));
$idade31a40anosMulheres = floor(($idade31a40anosMulheres * 100) / count($novaidadeMulheres));
$idade41anosMulheres = floor(($idade41anosMulheres * 100) / count($novaidadeMulheres));


$idade14a18anosHomens = null;
$idade19a25anosHomens = null;
$idade26a30anosHomens = null;
$idade31a40anosHomens = null;
$idade41anosHomens = null;

for ($x = 0; $x < count($novaidadeHomens); $x++) {
    
    if ($novaidadeHomens[$x] >= 14 && $novaidadeHomens[$x] <= 18) {
        $idade14a18anosHomens++;
    } else if ($novaidadeHomens[$x] >= 19 && $novaidadeHomens[$x] <= 25) {
        $idade19a25anosHomens++;
    } else if ($novaidadeHomens[$x] >= 26 && $novaidadeHomens[$x] <= 30) {
        $idade26a30anosHomens++;
    } else if ($novaidadeHomens[$x] >= 31 && $novaidadeHomens[$x] <= 40) {
        $idade31a40anosHomens++;
    } else if ($novaidadeHomens[$x] >= 41) {
        $idade41anosHomens++;
    }
}


$idade14a18anosHomens = floor(($idade14a18anosHomens * 100) / count($novaidadeHomens));
$idade19a25anosHomens = floor(($idade19a25anosHomens * 100) / count($novaidadeHomens));
$idade26a30anosHomens = floor(($idade26a30anosHomens * 100) / count($novaidadeHomens));
$idade31a40anosHomens = floor(($idade31a40anosHomens * 100) / count($novaidadeHomens));
$idade41anosHomens = floor(($idade41anosHomens * 100) / count($novaidadeHomens));





