<?php


$matriculasHoje = $matriculaServicos->matriculasRealizadasDiasAtras('0');
$matriculasRecentes = $matriculaServicos->recentes('5');

$matriculasRealizadasHoje = $matriculaServicos->matriculasRealizadasDiasAtras('0');
$matriculasRealizadasHoje = (array_values($matriculasRealizadasHoje)[0]);

$matriculasRealizadasOntem = $matriculaServicos->matriculasRealizadasDiasAtras('24');
$matriculasRealizadasOntem = (array_values($matriculasRealizadasOntem)[0]) - $matriculasRealizadasHoje;

$matriculasRealizadasDoisDiasAtras = $matriculaServicos->matriculasRealizadasDiasAtras('48');
$matriculasRealizadasDoisDiasAtras = (array_values($matriculasRealizadasDoisDiasAtras)[0]) - $matriculasRealizadasHoje  - $matriculasRealizadasOntem;

$matriculasRealizadasTresDiasAtras = $matriculaServicos->matriculasRealizadasDiasAtras('72');
$matriculasRealizadasTresDiasAtras = (array_values($matriculasRealizadasTresDiasAtras)[0]) - $matriculasRealizadasHoje  - $matriculasRealizadasOntem - $matriculasRealizadasDoisDiasAtras;

$matriculasRealizadasQuatroDiasAtras = $matriculaServicos->matriculasRealizadasDiasAtras('96');
$matriculasRealizadasQuatroDiasAtras = (array_values($matriculasRealizadasQuatroDiasAtras)[0]) - $matriculasRealizadasHoje  - $matriculasRealizadasOntem - $matriculasRealizadasDoisDiasAtras - $matriculasRealizadasTresDiasAtras;

$quatroDias = date("d", time() - (3600 * 96));
$tresDias = date("d", time() - (3600 * 72));
$doisDias = date("d", time() - (3600 * 48));
$ontem = date("d", time() - (3600 * 24));
$hoje = date("d");
$mes = date('m');

?>