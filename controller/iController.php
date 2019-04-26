<?php

interface iController {
    
    public static function buscarPorId($id);
    
    public static function excluir($id);
    
    public static function listar();
        
    public static function retornar();

    public static function salvar($surce);
    
}
