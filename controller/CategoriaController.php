<?php

class CategoriaController implements iController{
    
    public static function carregar($method, $idCategoria, $nomeCategoria) {
        if($method === "salvar"){
            $categoria = new Categoria($idCategoria, $nomeCategoria);
            self::salvar($categoria);
        }
    }
    
    public static function carregarVazio(){
        return new Categoria(NULL, NULL);
    }

        public static function buscarPorId($idCategoria) {
        try {
            $stmt = CategoriaDao::buscarPorId($idCategoria);
            $categoria = new Categoria($stmt['id_categoria'], $stmt['nome_categoria']);
            return $categoria;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idCategoria) {
        try {
            CategoriaDao::excluir($idCategoria);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return CategoriaDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ../view/categoria.php');
    }
       
    public static function salvar($categoria) {
        try {
            CategoriaDao::salvar($categoria);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

}
