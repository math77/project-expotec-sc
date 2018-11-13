<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author matheus
 */
class Connection {

    private $usr = "root";
    private $pass = "root";
    private $url = "127.0.0.1";
    private $database = "project_expotec";


    private function getConnection() {
        $conn = new mysqli($this->url, $this->usr, $this->pass, $this->database);
        $conn->set_charset("utf-8");
        return $conn;
    }

    public static function executar($query) {
        $obj = new Connection();
        $con = $obj->getConnection();
        $resultado = $con->query($query);
        $con->close();
        return $resultado;
    }
}
