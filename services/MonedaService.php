<?php


class MonedaService
{

    protected $crudMoneda;
    protected $conexion;

    public function __construct(Crud $crudMoneda)
    {
        $this->crudMoneda = $crudMoneda;
        $this->conexion = (new Conexion())->conectar();
    }

    public function findAll()
    {
        try {
            $Monedas = $this->crudMoneda->findAll();
            return $Monedas;

        } catch (Exception $e) {
            echo "Error al obtener las monedas: " . $e->getMessage();
            return null;
        }
    }
}
