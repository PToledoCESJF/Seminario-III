<?php

class Usuario {
    
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $cpf;
    private $tipo;
    private $dataNascimento;
    private $dataInclusao;
    
    public function __construct($idUsuario, $nome, $email, $senha, $telefone, $cpf, $tipo, $dataNascimento, $dataInclusao) {
        $this->idUsuario = $idUsuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->tipo = $tipo;
        $this->dataNascimento = $dataNascimento;
        $this->dataInclusao = $dataInclusao;
    }
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getDataInclusao() {
        return $this->dataInclusao;
    }

}
