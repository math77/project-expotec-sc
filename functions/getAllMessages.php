<?php

require_once dirname(__FILE__).'/../classes/Message.php';

$page = $_POST['page'];
$qntd = 3;
$inicio = $qntd * $page;

$posts = Message::getAllMessagesLimit($inicio, $qntd);

$data = array();

if($posts != null){
  foreach ($posts as $post) {
    $date = explode(" ", $post->getDate());
    $data[] = array("id" => $post->getId(),
                    "message" => $post->getBodyMessage(),
                    "date" => implode('/', array_reverse(explode('-', $date[0]))),
                    "issuer" => $post->getIssuerName(),
                    "image" => $post->getImage(),
                    "campi" => $post->getIssuerCampi());
  }

  header('Content-type: application/json');
  echo json_encode($data, true);
}
 ?>
