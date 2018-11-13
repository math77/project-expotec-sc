<?php

require_once dirname(__FILE__).'/Connection.php';


class CampiDAO {

  public static function getAllCampi(){
      $query = "SELECT id_campi, name_campi FROM Campi";
      return Connection::executar($query);
  }

}
