<?php

class ProdutoController implements iController{
    
    public static function carregar($method, $idProduto, $nomeProduto, $valor, $estoque, 
                    $descricao, $idCategoria) {
        if($method === "salvar"){
            $produto = new Produto($idProduto, $nomeProduto, $valor, $estoque, 
                    $descricao, $idCategoria);
            self::salvar($produto);
        }elseif($method === "excluir") {
            self::excluir($idProduto);
        }elseif ($method === "vazio") {
            return new Produto(NULL, NULL, NULL, NULL, NULL, NULL);
        }
    }
    
    public static function buscarPorId($idProduto) {
        try {
            $stmt = ProdutoDao::buscarPorId($idProduto);
            $produto = new Produto($stmt['id_produto'], $stmt['nome_produto'], $stmt['valor'], 
                $stmt['estoque'], $stmt['descricao'], $stmt['id_categoria']);
            return $produto;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idProduto) {
        try {
            ProdutoDao::excluir($idProduto);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return ProdutoDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ../view/produto.php');
    }

    public static function salvar($produto) {
        try {
            ProdutoDao::salvar($produto);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
