<?php

class Categoria {
    public $id;
    public $nombre;

    public function __construct($_id, $_nombre) {
        $this->id=$_id;
        $this->nombre=$_nombre;
    }
}

?>