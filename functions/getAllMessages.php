<?php

require_once dirname(__FILE__).'/../classes/Message.php';

$posts = Message::getAllMessages();

$data = array();

if($posts != null){

  foreach ($posts as $post) {
    $date = explode(" ", $post->getDate());
    $data[] = array("id" => $post->getId(),
                    "message" => $post->getBodyMessage(),
                    "date" => implode('/', array_reverse(explode('-', $date[0]))),
                    "issuer" => $post->getIssuerName());
  }

  echo json_encode($data);
}else{
    echo json_encode(array('mensagem' =>  'Ooops, não há nenhuma publicação'));
}
 ?>
