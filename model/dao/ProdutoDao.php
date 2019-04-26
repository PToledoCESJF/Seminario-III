<?php

class ProdutoDao implements iDao{

    public static function buscarPorId($idProduto) {
        try {
            $conexao = Conexao::conectar();
            $queryBuscaPorId = "SELECT * FROM tb_produto WHERE id_produto = :id_produto";
            $stmt = $conexao->prepare($queryBuscaPorId);
            $stmt->bindValue(':id_produto', $idProduto);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
                
    }

    public static function excluir($idProduto) {
        try {
            $conexao = Conexao::conectar();
            $queryExcluir = "DELETE FROM tb_produto WHERE id_produto = :id_produto";
            $stmt = $conexao->prepare($queryExcluir);
            $stmt->bindValue(':id_produto', $idProduto);
            $stmt->execute();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $queryListar = "SELECT * FROM tb_produto";
            $stmt = $conexao->prepare($queryListar);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($produto) {
        try {
            $conexao = Conexao::conectar();
            
            if($produto->getIdProduto() != NULL){
                $stmt = $conexao->prepare("UPDATE tb_produto SET nome_produto = :nome_produto, "
                        . "valor = :valor, estoque = :estoque, descricao = :descricao, "
                        . "id_categoria = :id_categoria WHERE id_produto = :id_produto");
                $stmt->bindValue(':id_produto', $produto->getIdProduto());
            } else {
                $stmt = $conexao->prepare("INSERT INTO tb_produto(nome_produto, valor, "
                        . "estoque, descricao, id_categoria) VALUES(:nome_produto, :valor, "
                        . ":estoque, :descricao, :id_categoria)");
            }

            $stmt->bindValue(':nome_produto', $produto->getNomeProduto());
            $stmt->bindValue(':valor', $produto->getValor());
            $stmt->bindValue(':estoque', $produto->getEstoque());
            $stmt->bindValue(':descricao', $produto->getDescricao());
            $stmt->bindValue(':id_categoria', $produto->getIdCategoria());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
