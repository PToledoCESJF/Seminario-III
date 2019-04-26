<?php

class PedidoController implements iController{
    
    public static function carregar($method, $idPedido, $dataPedido, $idUsuario) {
        if($method === "salvar"){
            $pedido = new Pedido($idPedido, $dataPedido, $idUsuario);
            self::salvar($pedido);
        }elseif($method === "excluir") {
            self::excluir($idPedido);
        }elseif ($method === "vazio") {
            return new Pedido(NULL, NULL, NULL);
        }
    }
    
    public static function buscarPorId($idPedido) {
        try {
            $stmt = PedidoDao::buscarPorId($idPedido);
            $pedido = new Pedido($stmt['id_pedido'], $stmt['data_pedido'], 
                    $stmt['id_usuario']);
            return $pedido;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idPedido) {
        try {
            PedidoDao::excluir($idPedido);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return PedidoDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ../view/pedido.php');
    }

    public static function salvar($pedido) {
        try {
            PedidoDao::salvar($pedido);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
