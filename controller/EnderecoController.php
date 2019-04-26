<?php

class EnderecoController implements iController{
    
    public static function carregar($method, $idEndereco, $descricao, $logradouro, 
            $numero, $cep, $bairro, $cidade, $uf, $idUsuario) {
        if($method === "salvar"){
            $endereco = new Endereco($idEndereco, $descricao, $logradouro, $numero, 
                    $cep, $bairro, $cidade, $uf, $idUsuario);
            self::salvar($endereco);
        }elseif($method === "excluir") {
            self::excluir($idEndereco);
        }elseif ($method === "vazio") {
            return new Endereco(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
        }
    }
    
    public static function buscarPorId($idEndereco) {
        try {
            $stmt = EnderecoDao::buscarPorId($idEndereco);
            $endereco = new Endereco($stmt['id_endereco'], $stmt['descricao'], 
                    $stmt['logradouro'], $stmt['numero'], $stmt['cep'], 
                    $stmt['bairro'], $stmt['cidade'], $stmt['uf'], $stmt['idUsuario']);
            return $endereco;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idEndereco) {
        try {
            EnderecoDao::excluir($idEndereco);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return EnderecoDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ../view/categoria.php');
    }

    public static function salvar($endereco) {
        try {
            EnderecoDao::salvar($endereco);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
