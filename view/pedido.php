<?php
require_once '../config/Global.php';

try {

    $method = filter_input(INPUT_POST, 'metodo');

    if($method === 'salvar' ){
        $idCategoria = filter_input(INPUT_POST, 'id_categoria');
        $nomeCategoria = filter_input(INPUT_POST, 'nome_categoria');
        CategoriaController::carregar($method, $idCategoria, $nomeCategoria);
    }elseif($method === 'excluir' ){
        $idCategoria = filter_input(INPUT_POST, 'id_categoria');
        CategoriaController::carregar($method, $idCategoria, NULL);
    }elseif ($method === 'buscar') {
        $categoria = CategoriaController::buscarPorId(filter_input(INPUT_POST, 'id_categoria'));
    } else {
        $categoria = CategoriaController::carregar("vazio", NULL, NULL);
    }
    

    $categoriaLista = CategoriaController::listar();
} catch (Exception $exc) {
    Erro::trataErro($exc);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categoria</title>
    </head>
    <body>
        <a href="../view/index.php">HOME</a><br />
        <form action="categoria.php" method="POST">
            <input type="hidden" name="metodo" value="salvar">
            <input type="hidden" name="id_categoria" value="<?php echo $categoria->getIdCategoria() ?>">
            Categoria: <input type="text" name="nome_categoria" value="<?php echo $categoria->getNomeCategoria() ?>">
            <button type="submit">Salvar</button>
        </form>
        
        <?php if(count($categoriaLista) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categoriaLista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['id_categoria'] ?></td>
                        <td><?php echo $linha['nome_categoria'] ?></td>
                        <td>
                            <form action="../view/categoria.php" method="POST">
                                <input type="hidden" name="metodo" value="buscar">
                                <input type="hidden" name="id_categoria" value="<?php echo $linha['id_categoria'] ?>">
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="../view/categoria.php" method="POST">
                                <input type="hidden" name="metodo" value="excluir">
                                <input type="hidden" name="id_categoria" value="<?php echo $linha['id_categoria'] ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma Categoria cadastrada!</p>
        <?php endif ?>
    </body>
</html>
