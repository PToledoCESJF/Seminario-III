<?php

class ItemPedidoController implements iController{
    
    public static function carregar($method, $idItemPedido, $quantidade, $idPedido, $idProduto) {
        if($method === "salvar"){
            $itemPedido = new ItemPedido($idItemPedido, $quantidade, $idPedido, $idProduto);
            self::salvar($itemPedido);
        }elseif($method === "excluir") {
            self::excluir($idItemPedido);
        }elseif ($method === "vazio") {
            return new ItemPedido(NULL, NULL, NULL, NULL);
        }
    }
    
    public static function buscarPorId($idItemPedido) {
        try {
            $stmt = ItemPedidoDao::buscarPorId($idItemPedido);
            $itemPedido = new ItemPedido($stmt['id_item_pedido'], $stmt['quantidade'], 
                    $stmt['id_pedido'], $stmt['id_produto']);
            return $itemPedido;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idItemPedido) {
        try {
            ItemPedidoDao::excluir($idItemPedido);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return ItemPedidoDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ../view/item_pedido.php');
    }

    public static function salvar($itemPedido) {
        try {
            ItemPedidoDao::salvar($itemPedido);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
