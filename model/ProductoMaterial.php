<?php 
class ProductoMaterial {
    private $productoId;
    private $materialId;

    public function __construct($productoId, $materialId) {
        $this->productoId = $productoId;
        $this->materialId = $materialId;
    }

    public function getProductoId() {
        return $this->productoId;
    }

    public function getMaterialId() {
        return $this->materialId;
    }

}
