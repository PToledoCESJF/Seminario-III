<?php

interface iDao {
    
    public static function buscarPorId($id);

    public static function excluir($id);
    
    public static function listar();
    
    public static function salvar($source);
    
}
