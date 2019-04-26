<?php

require_once '../config/Global.php';

class CategoriaDao implements iDao{

    public static function buscarPorId($idCategoria) {
        try {
            $conexao = Conexao::conectar();
            $queryBuscaPorId = "SELECT * FROM tb_categoria WHERE id_categoria = :id_categoria";
            $stmt = $conexao->prepare($queryBuscaPorId);
            $stmt->bindValue(':id_categoria', $idCategoria);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
                
    }

    public static function excluir($idCategoria) {
        try {
            $conexao = Conexao::conectar();
            $queryExcluir = "DELETE FROM tb_categoria WHERE id_categoria = :id_categoria";
            $stmt = $conexao->prepare($queryExcluir);
            $stmt->bindValue(':id_categoria', $idCategoria);
            $stmt->execute();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $queryListar = "SELECT * FROM tb_categoria";
            $stmt = $conexao->prepare($queryListar);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($categoria) {
        try {
            $conexao = Conexao::conectar();
            
            if($categoria->getIdCategoria() != NULL){
                $stmt = $conexao->prepare("UPDATE tb_categoria SET nome_categoria = :nome_categoria"
                    . " WHERE id_categoria = :id_categoria");
                $stmt->bindValue(':id_categoria', $categoria->getIdCategoria());
            } else {
                $stmt = $conexao->prepare("INSERT INTO tb_categoria(nome_categoria) "
                    . "VALUES(:nome_categoria)");
            }

            $stmt->bindValue(':nome_categoria', $categoria->getNomeCategoria());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
