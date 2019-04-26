<?php

class Produto {

    private $idProduto;
    private $produto;
    private $valor;
    private $estoque;
    private $descricao;
    private $idCategoria;
    
    public function __construct($idProduto, $produto, $valor, $estoque, $descricao, $idCategoria) {
        $this->idProduto = $idProduto;
        $this->produto = $produto;
        $this->valor = $valor;
        $this->estoque = $estoque;
        $this->descricao = $descricao;
        $this->idCategoria = $idCategoria;
    }
    
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getProduto() {
        return $this->produto;
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
