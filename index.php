<?php 

require_once("vendor/autoload.php");

$dataHora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
$timestamp = $dataHora->getTimestamp();

$dataHoraFormatada = $dataHora->format('d/m/Y H:i:s');

print_r($dataHoraFormatada);