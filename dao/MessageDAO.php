<?php

require_once dirname(__FILE__).'/Connection.php';

/**
 * Description of MessageDAO
 *
 * @author matheus
 */
class MessageDAO {

    public static function saveMessage($bodyMessage, $issuerName, $issuerCampi, $image){
        $query = "INSERT INTO Message(body_message, issuer_name, date_send, issuer_campi, image) VALUES "
                . "('$bodyMessage', '$issuerName', NOW(), '$issuerCampi', '$image')";

        return Connection::executar($query);
    }

    public static function getAllMessages(){
        $query = "SELECT id, body_message, date_send, issuer_name, image FROM Message";
        return Connection::executar($query);
    }
}
