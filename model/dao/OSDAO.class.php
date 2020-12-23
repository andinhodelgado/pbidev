<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('../dbutil/Conn.class.php');
/**
 * Description of OSDAO
 *
 * @author anderson
 */
class OSDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados($os, $base) {

        $select = " SELECT "
                    . " OS_ID AS \"idOS\" "
                    . " , NRO AS \"nroOS\" "
                    . " , TIPO AS \"tipoOS\" "
                . " FROM "
                    . " USINAS.VMB_OS_INDU "
                . " WHERE "
                    . " NRO = " . $os;

        $this->Conn = parent::getConn($base);
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    }
    
}
