<?php 
namespace App\Helpers;
class Route {
    static private $routes = [];
    static public function addRoute(
        string $http_method,
        string $route_name,
        string $controller,
        string $action
    ): void
    {
        self::$routes[$http_method][$route_name]  = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    static public function run(){
        try {

            $http_method = $_SERVER['REQUEST_METHOD'] ?? null;
            $route = substr($_SERVER['REQUEST_URI'],1) ?? null;
            $route = explode('?',$route)[0];
            $data = $_REQUEST['data'] ?? [];

            if(isset($_SERVER['HTTP_CONTENT_TYPE'])){
                $json_data = json_decode(file_get_contents('php://input'), true);
                $data = array_merge($data,$json_data) ;
            }
            if(empty($http_method) || empty($route) ){
                throw new  \DomainException(" Rota não encontrada");
            }
            if(!isset(Self::$routes[$http_method][$route])){
                throw new  \DomainException("Rota não encontrada");
            }
            $namespace_controller = Self::$routes[$http_method][$route]['controller'];
            if(!class_exists($namespace_controller)){
                throw new  \DomainException("Controller não encontrado."); 
            }
            
            $controller = new $namespace_controller();
            $method = Self::$routes[$http_method][$route]['action'];
            if(!method_exists($controller, $method)){
                throw new  \DomainException("Método não encontrado."); 
            }
            $response = $controller->{$method}($data );
            $response->getResponse();
        } catch(\DomainException $e){
            (new Response(
                404,
                [],
                [
                    'title_error' => 'Não foi possível executar a ação',
                    'msg_error' => $e->getMessage()
                ]
                ))->getResponse();
        } catch(\Exception $e){
            (new Response(
                500,
                [],
                [
                    'title_error' => 'Não foi possível executar a ação',
                    'msg_error' => $e->getMessage()
                ]
                ))->getResponse();
        }
       
    }
}