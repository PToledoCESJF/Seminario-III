<?php

class EnderecoDao implements iDao{

    public static function buscarPorId($idEndereco) {
        try {
            $conexao = Conexao::conectar();
            $queryBuscaPorId = "SELECT * FROM tb_endereco WHERE id_endereco = :id_endereco";
            $stmt = $conexao->prepare($queryBuscaPorId);
            $stmt->bindValue(':id_endereco', $idEndereco);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
                
    }

    public static function excluir($idEndereco) {
        try {
            $conexao = Conexao::conectar();
            $queryExcluir = "DELETE FROM tb_endereco WHERE id_endereco = :id_endereco";
            $stmt = $conexao->prepare($queryExcluir);
            $stmt->bindValue(':id_endereco', $idEndereco);
            $stmt->execute();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $queryListar = "SELECT * FROM tb_endereco";
            $stmt = $conexao->prepare($queryListar);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($endereco) {
        try {
            $conexao = Conexao::conectar();
            
            if($endereco->getIdEndereco() != NULL){
                $stmt = $conexao->prepare("UPDATE tb_endereco SET descricao = :descricao, "
                        . "logradouro = :logradouro, numero = :numero, cep = :cep, bairro = :bairro, "
                        . "cidade = :cidade, uf = :uf, id_usuario = :id_usuario "
                    . " WHERE id_endereco = :id_endereco");
                $stmt->bindValue(':id_endereco', $endereco->getIdEndereco());
            } else {
                $stmt = $conexao->prepare("INSERT INTO tb_endereco(descricao, logradouro, "
                        . "numero, cep, bairro, cidade, uf, id_usuario) VALUES(:descricao, :logradouro, "
                        . ":numero, :cep, :bairro, :cidade, :uf, :id_usuario)");
            }

            $stmt->bindValue(':descricao', $endereco->getDescricao());
            $stmt->bindValue(':logradouro', $endereco->getLogradouro());
            $stmt->bindValue(':numero', $endereco->getNumero());
            $stmt->bindValue(':cep', $endereco->getCep());
            $stmt->bindValue(':bairro', $endereco->getBairro());
            $stmt->bindValue(':cidade', $endereco->getCidade());
            $stmt->bindValue(':uf', $endereco->getUf());
            $stmt->bindValue(':id_usuario', $endereco->getUsuario());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
