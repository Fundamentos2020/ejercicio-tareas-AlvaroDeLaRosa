<?php

require_once('..\Models\Tarea.php');
require_once('..\Models\DB.php');

$sel=$_GET['key'];

$connection=conect();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
if($sel==0) {
    $query=$connection->prepare('SELECT * FROM tareas');
}
else {
    $query=$connection->prepare('SELECT * FROM tareas WHERE categoria_id=:categoria');
    $query->bindParam(':categoria', $sel, PDO::PARAM_INT);
}
$query->execute();
$tareas=array();
while($row=$query->fetch(PDO::FETCH_ASSOC)) {
    $tarea=new Tarea($row['id'], $row['titulo'], $row['descripcion'], $row['fecha_limite'], $row['completada'], $row['categoria_id']);
    $tareas[]=$tarea;
}
$mes=json_encode($tareas);
echo $mes;

?>