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
    
    public static function getAllMessagesLimit($inicio, $qtd){
        $query = "SELECT id, body_message, date_send, issuer_name, image, Campi.name_campi AS campi FROM Message, Campi
        WHERE Message.issuer_campi = Campi.id_campi LIMIT $inicio, $qtd";
        return Connection::executar($query);
    }
}
