<?php

class Categoria {
    
    private $idCategoria;
    private $categoria;
    
    public function __construct($idCategoria, $categoria) {
        $this->idCategoria = $idCategoria;
        $this->categoria = $categoria;
    }
    
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getCategoria() {
        return $this->categoria;
    }

}
