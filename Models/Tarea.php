<?php

class Tarea {
    public $id;
    public $titulo;
    public $descripcion;
    public $fecha_limite;
    public $completada;
    public $categoria_id;

    public function __construct($_id, $_titulo, $_descripcion, $_fecha_limite, $_completada, $_categoria_id) {
        $this->id=$_id;
        $this->titulo=$_titulo;
        $this->descripcion=$_descripcion;
        $this->fecha_limite=$_fecha_limite;
        $this->completada=$_completada;
        $this->categoria_id=$_categoria_id;
    }
}

?>
