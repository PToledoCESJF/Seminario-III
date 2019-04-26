<?php

class PedidoDao implements iDao{
    
    
    public static function buscarPorId($idPedido) {
        try {
            $conexao = Conexao::conectar();
            $queryBuscaPorId = "SELECT * FROM tb_pedido WHERE id_pedido = :id_pedido";
            $stmt = $conexao->prepare($queryBuscaPorId);
            $stmt->bindValue(':id_pedido', $idPedido);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
                
    }

    public static function excluir($idPedido) {
        try {
            $conexao = Conexao::conectar();
            $queryExcluir = "DELETE FROM tb_pedido WHERE id_pedido = :id_pedido";
            $stmt = $conexao->prepare($queryExcluir);
            $stmt->bindValue(':id_pedido', $idPedido);
            $stmt->execute();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $queryListar = "SELECT * FROM tb_pedido";
            $stmt = $conexao->prepare($queryListar);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($pedido) {
        try {
            $conexao = Conexao::conectar();
            
            if($pedido->getIdPedido() != NULL){
                $stmt = $conexao->prepare("UPDATE tb_pedido SET data_pedido = :data_pedido, "
                        . "id_usuario = :id_usuario WHERE id_pedido = :id_pedido");
                $stmt->bindValue(':id_pedido', $pedido->getIdPedido());
            } else {
                $stmt = $conexao->prepare("INSERT INTO tb_pedido(data_pedido, id_usuario "
                        . "VALUES(:data_pedido, :id_usuario)");
            }

            $stmt->bindValue(':data_pedido', $pedido->getDataPedido());
            $stmt->bindValue(':id_usuario', $pedido->getIdUsuario());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
