<?php


class MaterialesService
{

    protected $crudMateriales;
    protected $conexion;

    public function __construct(Crud $crudMateriales)
    {
        $this->crudMateriales = $crudMateriales;
        $this->conexion = (new Conexion())->conectar();
    }

    public function findAll()
    {
        try {
            $Materialess = $this->crudMateriales->findAll();
            return $Materialess;

        } catch (Exception $e) {
            echo "Error al guardar el producto y sus materiales: " . $e->getMessage();
            return null;
        }
    }
}
