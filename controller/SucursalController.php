<?php
require_once './services/SucursalService.php';
require_once './model/Crud.php';
require_once './model/Sucursal.php';
require_once './core/Respuesta.php';

class SucursalController
{
    protected $sucursalService;

    public function __construct()
    {
        $this->sucursalService = new SucursalService(new Crud('sucursales'));
    }

    public function index()
    {
        require_once './view/producto.php';
    }

    public function findAll()
    {

        try {
            $bodegaId = $_POST['id'] ?? null;
            if ($bodegaId) {
                $bodegaData = ["bodega_id" => (int)$bodegaId];
                $sucursales = $this->sucursalService->findAll($bodegaData);
                $respuesta = new Respuesta(200, "Datos de sucursales", $sucursales);
            } else {
                $respuesta = new Respuesta(400, "ID de bodega no proporcionado");
            }

            echo $respuesta->json();
        } catch (Exception $ex) {
            $respuesta = new Respuesta(500, "Ocurrio un error");
        }
    }
}
