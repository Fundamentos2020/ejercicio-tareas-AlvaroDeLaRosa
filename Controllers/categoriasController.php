<?php

require_once('..\Models\Categoria.php');
require_once('..\Models\DB.php');

$connection=conect();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$query=$connection->prepare('SELECT * FROM categorias');
$query->execute();
$categorias=array();
while($row=$query->fetch(PDO::FETCH_ASSOC)) {
    $cat=new Categoria($row['id'], $row['nombre']);
    $categorias[]=$cat;
}
$mes=json_encode($categorias);
echo $mes;

function getCatName($id) {
    $connection=conect();
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $query=$connection->prepare('SELECT * FROM categorias WHERE categoria_id=:categoria');
    $query->bindParam(':categoria', $id, PDO::PARAM_INT);
    while($row=$query->fetch(PDO::FETCH_ASSOC)) {
        $nom=$row['nombre'];
    }
    return $nom;
}

?>
