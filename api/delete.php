<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'delete') {

    parse_str(file_get_contents('php://input'), $input);

    /** php anterior ao 7.4
     * $id = (!empty($input['id'])) ? $input['id'] : null;
     */

    $id = $input['id'] ?? null;

    $id = filter_var($id);

    if ($id) {

        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $sql = $pdo->prepare("DELETE FOM notes WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
        } else {
            $array['error'] = 'id inexistente';
        }
    } else {
        $array['error'] = 'ID nao enviados';
    }
} else {
    $array['error'] = 'Metodo nao permitido (apenas DELETE)';
}

require('return.php');
