<?php

class Condominio {
    public $dateInclusao = '';
    public $cemig = 0;
    public $copasa = 0;
    public $tarifa = 0;
    public $limpeza = 0;
    public $outros = 0;
    public $qtdMoradores = 0;
    public $resultado = 0;
    public $resultadoPorMoradores = 0;
    
    function __construct($dateInclusao, $cemig, $copasa, $tarifa, $limpeza, $outros, $qtdMoradores) {
        $this->setDateInclusao($dateInclusao);
        $this->setCemig($cemig);
        $this->setCopasa($copasa);
        $this->setTarifa($tarifa);
        $this->setLimpeza($limpeza);
        $this->setOutros($outros);
        $this->setQtdMoradores($qtdMoradores);
        $this->resultado = $this->cemig + $this->copasa + $this->tarifa + $this->limpeza + $this->outros;
        $this->resultadoPorMoradores = $this->resultado / $this->qtdMoradores; 
        
    }

    public function setDateInclusao($val) {
        $arr = explode("-", $val);
        $this->dateInclusao = $arr[2].'/'.$arr[1].'/'.$arr[0];
    }
    public function setCemig($val) {
        $this->cemig = intval($val);
    }
    public function setCopasa($val) {
        $this->copasa = intval($val);
    }
    public function setTarifa($val) {
        $this->tarifa = intval($val);
    }
    public function setLimpeza($val) {
        $this->limpeza = intval($val);
    }
    public function setOutros($val) {
        $this->outros = intval($val);
    }
    public function setQtdMoradores($val) {
        $this->qtdMoradores = intval($val);
    }
}
