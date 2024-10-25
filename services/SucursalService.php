<?php


class SucursalService
{

    protected $crudSucursal;
    protected $conexion;

    public function __construct(Crud $crudSucursal)
    {
        $this->crudSucursal = $crudSucursal;
        $this->conexion = (new Conexion())->conectar();
    }

    public function findAll($id)
    {
        try {
            $sucursales = $this->crudSucursal->findAll($id);
            return $sucursales;

        } catch (Exception $e) {
            echo "Error al guardar el producto y sus materiales: " . $e->getMessage();
            return null;
        }
    }
}
