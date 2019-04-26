<?php

class Pedido {

    private $idPedido;
    private $dataPedido;
    private $idUsuario;
    
    public function __construct($idPedido, $dataPedido, $idUsuario) {
        $this->idPedido = $idPedido;
        $this->dataPedido = $dataPedido;
        $this->idUsuario = $idUsuario;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getDataPedido() {
        return $this->dataPedido;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }


}
