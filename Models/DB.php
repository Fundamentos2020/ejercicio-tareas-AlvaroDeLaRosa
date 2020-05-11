<?php

function conect() {
    try {
        $dns='mysql:host=localhost;dbname=lista_tareas';
        $username='root';
        $password='';
        return new PDO($dns, $username, $password);
    }
    catch(PDOException $e) {
        echo '<h2>Lo siento, un error de naturaleza '.$e.' ha ocurrido</h2>';
    }
}

?>