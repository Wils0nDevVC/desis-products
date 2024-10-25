<?php
class Producto {
    private $id;
    private $codigo;
    private $nombre;
    private $bodegaId;
    private $sucursalId;
    private $monedaId;
    private $precio;
    private $descripcion;

    
    public function __construct($id, $codigo, $nombre, $bodegaId, $sucursalId, $monedaId, $precio, $descripcion) {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->bodegaId = $bodegaId;
        $this->sucursalId = $sucursalId;
        $this->monedaId = $monedaId;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getBodegaId() {
        return $this->bodegaId;
    }

    public function setBodegaId($bodegaId) {
        $this->bodegaId = $bodegaId;
    }

    public function getSucursalId() {
        return $this->sucursalId;
    }

    public function setSucursalId($sucursalId) {
        $this->sucursalId = $sucursalId;
    }

    public function getMonedaId() {
        return $this->monedaId;
    }

    public function setMonedaId($monedaId) {
        $this->monedaId = $monedaId;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}
