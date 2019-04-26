<?php

class Produto {

    private $idProduto;
    private $nomeProduto;
    private $valor;
    private $estoque;
    private $descricao;
    private $idCategoria;
    
    public function __construct($idProduto, $nomeProduto, $valor, $estoque, $descricao, $idCategoria) {
        $this->idProduto = $idProduto;
        $this->nomeProduto = $nomeProduto;
        $this->valor = $valor;
        $this->estoque = $estoque;
        $this->descricao = $descricao;
        $this->idCategoria = $idCategoria;
    }
    
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getNomeProduto() {
        return $this->nomeProduto;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

}
