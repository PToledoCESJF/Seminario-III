<?php

class ItemPedido {
    
    private $idItemPedido;
    private $quantidade;
    private $idPedido;
    private $idProduto;
    
    public function __construct($idItemPedido, $quantidade, $idPedido, $idProduto) {
        $this->idItemPedido = $idItemPedido;
        $this->quantidade = $quantidade;
        $this->idPedido = $idPedido;
        $this->idProduto = $idProduto;
    }
    
    public function getIdItemPedido() {
        return $this->idItemPedido;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

}
