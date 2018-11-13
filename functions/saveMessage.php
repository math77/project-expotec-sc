<?php

require_once dirname(__FILE__).'/../classes/Message.php';

//$dados = json_decode($_POST['dados'], true);

//$date = date('Y-m-d');

$message = new Message();

$bodyMessage = filter_input(INPUT_POST, 'pMessage', FILTER_SANITIZE_STRING);
$issuerName = filter_input(INPUT_POST, 'pIssuer', FILTER_SANITIZE_STRING);
$issuerCampi = filter_input(INPUT_POST, 'pCampi', FILTER_SANITIZE_STRING);

$message->setBodyMessage($bodyMessage);
$message->setIssuerName($issuerName);
$message->setIssuerCampi($issuerCampi);
//$message->setDate($date);

if($message->saveMessage()){
  echo json_encode(array('mensagem' => "Salvo com sucesso"));
}else{
  echo json_encode(array('mensagem' => "Erro ao salvar"));
}
