<?php
class Sucursal {
    private $id;
    private $nombre;
    private $bodegaId;

    public function __construct($id, $nombre, $bodegaId) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->bodegaId = $bodegaId;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getBodegaId() {
        return $this->bodegaId;
    }

}
