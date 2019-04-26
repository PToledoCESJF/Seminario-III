<?php

class Endereco {
    
    private $idEndereco;
    private $descricao;
    private $logradouro;
    private $numero;
    private $cep;
    private $bairro;
    private $cidade;
    private $uf;
    private $idUsuario;
    
    public function __construct($idEndereco, $descricao, $logradouro, $numero, $cep, $bairro, $cidade, $uf, $idUsuario) {
        $this->idEndereco = $idEndereco;
        $this->descricao = $descricao;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->idUsuario = $idUsuario;
    }
    
    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

}
