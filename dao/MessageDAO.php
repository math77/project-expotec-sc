<?php

require_once dirname(__FILE__).'/Connection.php';

/**
 * Description of MessageDAO
 *
 * @author matheus
 */
class MessageDAO {

    public static function saveMessage($bodyMessage, $issuerName, $issuerCampi){
        $query = "INSERT INTO Message(body_message, issuer_name, date_send, issuer_campi) VALUES "
                . "('$bodyMessage', '$issuerName', NOW(), '$issuerCampi')";

        return Connection::executar($query);
    }

    public static function getAllMessages(){
        $query = "SELECT id, body_message, date_send, issuer_name FROM Message";
        return Connection::executar($query);
    }
}
