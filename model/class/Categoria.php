<?php

class Categoria {
    
    private $idCategoria;
    private $nomeCategoria;
    
    public function __construct($idCategoria, $nomeCategoria) {
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
    }
    
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getNomeCategoria() {
        return $this->nomeCategoria;
    }

}
