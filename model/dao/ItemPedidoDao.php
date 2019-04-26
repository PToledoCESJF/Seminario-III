<?php

class ItemPedidoDao implements iDao{
    
    public static function buscarPorId($idItemPedido) {
        try {
            $conexao = Conexao::conectar();
            $queryBuscaPorId = "SELECT * FROM tb_item_pedido WHERE id_item_pedido = :id_item_pedido";
            $stmt = $conexao->prepare($queryBuscaPorId);
            $stmt->bindValue(':id_item_pedido', $idItemPedido);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
                
    }

    public static function excluir($idItemPedido) {
        try {
            $conexao = Conexao::conectar();
            $queryExcluir = "DELETE FROM tb_item_pedido WHERE id_item_pedido = :id_item_pedido";
            $stmt = $conexao->prepare($queryExcluir);
            $stmt->bindValue(':id_item_pedido', $idItemPedido);
            $stmt->execute();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $queryListar = "SELECT * FROM tb_item_pedido";
            $stmt = $conexao->prepare($queryListar);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($itemPedido) {
        try {
            $conexao = Conexao::conectar();
            
            if($itemPedido->getIdItemPedido() != NULL){
                $stmt = $conexao->prepare("UPDATE tb_item_pedido SET quantidade = :quantidade, "
                        . "id_pedido = :id_pedido, id_produto = :id_produto "
                    . " WHERE id_item_pedido = :id_item_pedido");
                $stmt->bindValue(':id_item_pedido', $itemPedido->getIdItemPedido());
            } else {
                $stmt = $conexao->prepare("INSERT INTO tb_item_pedido(quantidade, id_pedido, "
                        . "id_produto) VALUES(:quantidade, :id_pedido, :id_produto)");
            }

            $stmt->bindValue(':quantidade', $itemPedido->getQuantidade());
            $stmt->bindValue(':id_pedido', $endereco->getIdPedido());
            $stmt->bindValue(':id_produto', $endereco->getIdProduto());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
