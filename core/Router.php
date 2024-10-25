<?php
class Router
{
    protected $routes = [];

    public function addRoute($path, $controller, $action)
    {
        $this->routes[$path] = ['controller' => $controller, 'action' => $action];
    }

    public function run()
    {


        $requestUri = rtrim($_SERVER['REQUEST_URI'], '/');

       

        $action = $this->routes[$requestUri] ?? null;
        
        if ($action) {
            $controllerName = $action['controller'];
            $actionName = $action['action'];
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $actionName)) {
                    $controller->$actionName();
                } else {
                    $this->handleError("Método no encontrado: $actionName");
                }
            } else {
                $this->handleError("Controlador no encontrado: $controllerName");
            }
        } else {
            $this->handleError("Ruta no encontrada: $requestUri");
        }
    }

    protected function handleError($message)
    {
        echo $message;
    }
}
