<?php

require_once dirname(__FILE__).'/../dao/CampiDAO.php';


class Campi {

  private $idCampi;
  private $nameCampi;

  public function getIdCampi() {
      return $this->idCampi;
  }

  public function getNameCampi() {
      return $this->nameCampi;
  }

  public function setIdCampi($idCampi) {
      $this->idCampi = $idCampi;
  }

  public function setNameCampi($nameCampi) {
      $this->nameCampi = $nameCampi;
  }

  public static function getAllCampi(){
      $campis = array();
      $data = CampiDAO::getAllCampi();

      if($data != null){
          while($obj = $data->fetch_assoc()){
            $campi = new Campi();
            $campi->setIdCampi($obj['id_campi']);
            $campi->setNameCampi($obj['name_campi']);
            $campis[] = $campi;
          }
      }
    return $campis;
  }
}
