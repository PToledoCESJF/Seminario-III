<?php
require_once '../config/Global.php';

try {

    $method = filter_input(INPUT_POST, 'metodo');

    if($method === 'salvar' ){
        $idEndereco = filter_input(INPUT_POST, 'id_endereco');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $logradouro = filter_input(INPUT_POST, 'logradouro');
        $numero = filter_input(INPUT_POST, 'numero');
        $cep = filter_input(INPUT_POST, 'cep');
        $bairro = filter_input(INPUT_POST, 'bairro');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $uf = filter_input(INPUT_POST, 'uf');
        $idUsuario = filter_input(INPUT_POST, 'id_usuario');
        EnderecoController::carregar($method, $idEndereco, $descricao, 
                $logradouro, $numero, $cep, $bairro, $cidade, $uf, $idUsuario);
    }elseif($method === 'excluir' ){
        $idEndereco = filter_input(INPUT_POST, 'id_endereco');
        EnderecoController::excluir($idEndereco);
    }elseif ($method === 'buscar') {
        $endereco = EnderecoController::buscarPorId(filter_input(INPUT_POST, 'id_endereco'));
    } else {
        $endereco = EnderecoController::carregarVazio();
    }
    
    $enderecoLista = EnderecoController::listar();
} catch (Exception $exc) {
    Erro::trataErro($exc);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Endereço</title>
    </head>
    <body>
        <a href="../view/index.php">HOME</a><br />
        <form action="endereco.php" method="POST">
            <input type="hidden" name="metodo" value="salvar">
            <input type="hidden" name="id_endereco" value="<?php echo $endereco->getIdEndereco() ?>"><br />
            Descrição: <input type="text" name="descricao" value="<?php echo $endereco->getDescricao() ?>"><br />
            Logradouro: <input type="text" name="logradouro" value="<?php echo $endereco->getLogradouro() ?>"><br />
            Numero: <input type="text" name="numero" value="<?php echo $endereco->getNumero() ?>"><br />
            Cep: <input type="text" name="cep" value="<?php echo $endereco->getCep() ?>"><br />
            Bairro: <input type="text" name="bairro" value="<?php echo $endereco->getBairro() ?>"><br />
            Cidade: <input type="text" name="cidade" value="<?php echo $endereco->getCidade() ?>"><br />
            Uf: <input type="text" name="uf" value="<?php echo $endereco->getUf() ?>"><br />
            Usuario: <input type="text" name="id_usuario" value="<?php echo $endereco->getIdUsuario() ?>"><br />
            <button type="submit">Salvar</button>
        </form>
        
        <?php if(count($enderecoLista) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Descriçõa</th>
                        <th>Logradouro</th>
                        <th>Numero</th>
                        <th>Cep</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Uf</th>
                        <th>Usuario</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($enderecoLista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['id_endereco'] ?></td>
                        <td><?php echo $linha['descricao'] ?></td>
                        <td><?php echo $linha['logradouro'] ?></td>
                        <td><?php echo $linha['numero'] ?></td>
                        <td><?php echo $linha['cep'] ?></td>
                        <td><?php echo $linha['bairro'] ?></td>
                        <td><?php echo $linha['cidade'] ?></td>
                        <td><?php echo $linha['uf'] ?></td>
                        <td><?php echo $linha['id_usuario'] ?></td>
                        <td>
                            <form action="../view/endereco.php" method="POST">
                                <input type="hidden" name="metodo" value="buscar">
                                <input type="hidden" name="id_endereco" value="<?php echo $linha['id_endereco'] ?>">
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="../view/endereco.php" method="POST">
                                <input type="hidden" name="metodo" value="excluir">
                                <input type="hidden" name="id_endereco" value="<?php echo $linha['id_endereco'] ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma Enderço cadastrado!</p>
        <?php endif ?>
    </body>
</html>
