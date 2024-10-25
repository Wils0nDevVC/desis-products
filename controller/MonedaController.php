<?php
require_once './services/MonedaService.php';
require_once './model/Crud.php';
require_once './model/Moneda.php';
require_once './core/Respuesta.php';

class MonedaController
{
    protected $MonedaService;

    public function __construct()
    {
        $this->MonedaService = new MonedaService(new Crud('monedas'));
    }

    public function index()
    {
        require_once './view/producto.php';
    }

    public function findAll()
    {
        
        $Monedas = $this->MonedaService->findAll();
        $respuesta = new Respuesta(200, "Datos de Monedas obtenidos correctamente", $Monedas);
        echo $respuesta->json();
    }
}
