<?php

class UsuarioDao implements iDao{

    public static function buscarPorId($idUsuario) {
        try {
            $conexao = Conexao::conectar();
            $queryBuscaPorId = "SELECT * FROM tb_usuario WHERE id_usuario = :id_usuario";
            $stmt = $conexao->prepare($queryBuscaPorId);
            $stmt->bindValue(':id_usuario', $idUsuario);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
                
    }

    public static function excluir($idUsuario) {
        try {
            $conexao = Conexao::conectar();
            $queryExcluir = "DELETE FROM tb_usuario WHERE id_usuario = :id_usuario";
            $stmt = $conexao->prepare($queryExcluir);
            $stmt->bindValue(':id_usuario', $idUsuario);
            $stmt->execute();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $queryListar = "SELECT * FROM tb_usuario";
            $stmt = $conexao->prepare($queryListar);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($usuario) {
        try {
            $conexao = Conexao::conectar();
            
            if($usuario->getIdUsuario() != NULL){
                $stmt = $conexao->prepare("UPDATE tb_usuario SET nome = :nome, "
                        . "email = :email, senha = :senha, telefone = :telefone, cpf = :cpf, "
                        . "tipo = :tipo, data_nascimento = :data_nascimento, data_inclusao = :data_inclusao "
                    . " WHERE id_usuario = :id_usuario");
                $stmt->bindValue(':id_usuario', $usuario->getIdUsuario());
            } else {
                $stmt = $conexao->prepare("INSERT INTO tb_usuario(nome, email, senha, telefone, cpf, "
                        . "tipo, data_nascimento, data_inclusao) VALUES(:nome, :email, :senha, :telefone, "
                        . ":cpf, :tipo, :data_nascimento, :data_inclusao)");
            }

            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':email', $usuario->getEmail());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':telefone', $usuario->getTelefone());
            $stmt->bindValue(':cpf', $usuario->getCpf());
            $stmt->bindValue(':tipo', $usuario->getTipo());
            $stmt->bindValue(':data_nascimento', $usuario->getDataNascimento());
            $stmt->bindValue(':data_inclusao', $usuario->getDataInclusao());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
