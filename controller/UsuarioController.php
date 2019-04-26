<?php

class UsuarioController implements iController{
    
    public static function carregar($method, $idUsuario, $nome, $email, $senha, $telefone, 
                    $cpf, $tipo, $dataNascimento, $dataInclusao) {
        if($method === "salvar"){
            $usuario = new Usuario($idUsuario, $nome, $email, $senha, $telefone, 
                    $cpf, $tipo, $dataNascimento, $dataInclusao);
            self::salvar($usuario);
        }elseif($method === "excluir") {
            self::excluir($idUsuario);
        }elseif ($method === "vazio") {
            return new Usuario(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
        }
    }
    
    public static function buscarPorId($idUsuario) {
        try {
            $stmt = UsuarioDao::buscarPorId($idUsuario);
            $usuario = new Usuario($stmt['idUsuario'], $stmt['nome'], $stmt['email'], 
                    $stmt['senha'], $stmt['telefone'], $stmt['cpf'], $stmt['tipo'], 
                    $stmt['dataNascimento'], $stmt['dataInclusao']);
        
            return $usuario;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idUsuario) {
        try {
            UsuarioDao::excluir($idUsuario);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return UsuarioDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ../view/usuario.php');
    }

    public static function salvar($usuario) {
        try {
            UsuarioDao::salvar($usuario);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
