<?php


class BodegaService
{

    protected $crudBodega;
    protected $conexion;

    public function __construct(Crud $crudBodega)
    {
        $this->crudBodega = $crudBodega;
        $this->conexion = (new Conexion())->conectar();
    }

    public function findAll()
    {
        try {
            $bodegas = $this->crudBodega->findAll();
            return $bodegas;

        } catch (Exception $e) {
            echo "Error al guardar el producto y sus materiales: " . $e->getMessage();
            return null;
        }
    }
}
