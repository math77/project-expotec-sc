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
    private $image;

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

    public function getImage(){
        return $this->image;
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

    public function setImage($image){
        $this->image = $image;
    }

    public function saveMessage(){
        return MessageDAO::saveMessage($this->bodyMessage, $this->issuerName, $this->issuerCampi, $this->image);
    }

    /*
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
              $message->setImage($obj['image']);
              $message->setIssuerCampi($obj['campi']);
              $posts[] = $message;
            }
        }
        return $posts;
    }
    */

    public static function getTotalRecords(){
        $data = MessageDAO::getTotalRecords();
        return $data->fetch_object()->total;
    }

    public static function getAllMessagesLimit($inicio, $qtd){
        $posts = array();
        $data = MessageDAO::getAllMessagesLimit($inicio, $qtd);

        if($data != null){
            while($obj = $data->fetch_assoc()){
              $message = new Message();
              $message->setId($obj['id']);
              $message->setBodyMessage($obj['body_message']);
              $message->setDate($obj['date_send']);
              $message->setIssuerName($obj['issuer_name']);
              $message->setImage($obj['image']);
              $message->setIssuerCampi($obj['campi']);
              $posts[] = $message;
            }
        }
        return $posts;
    }
}
