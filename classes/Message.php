<?php

require_once dirname(__FILE__).'/../dao/MessageDAO.php';

/**
 * Description of Message
 *
 * @author matheus
 */
class Message {

    private $id;
    private $date;
    private $bodyMessage;
    private $issuerName;
    private $issuerCampi;

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getBodyMessage() {
        return $this->bodyMessage;
    }

    public function getIssuerName() {
        return $this->issuerName;
    }

    public function getIssuerCampi() {
        return $this->issuerCampi;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setBodyMessage($bodyMessage) {
        $this->bodyMessage = $bodyMessage;
    }

    public function setIssuerName($issuerName) {
        $this->issuerName = $issuerName;
    }

    public function setIssuerCampi($issuerCampi) {
        $this->issuerCampi = $issuerCampi;
    }

    public function saveMessage(){
        return MessageDAO::saveMessage($this->bodyMessage, $this->issuerName, $this->issuerCampi);
    }

    public function serialize($message){
      return get_object_vars($message);
    }

    public static function getAllMessages(){
        $posts = array();
        $data = MessageDAO::getAllMessages();

        if($data != null){
            while($obj = $data->fetch_assoc()){
              $message = new Message();
              $message->setId($obj['id']);
              $message->setBodyMessage($obj['body_message']);
              $message->setDate($obj['date_send']);
              $message->setIssuerName($obj['issuer_name']);
              //$dado = serialize($message);
              $posts[] = $message;
            }
        }
        return $posts;
    }
}
