<?php
namespace Core;
class Route{
    protected $routes = [];
    public function get($uri,$controller){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>'GET'
        ];
    }
    public function post($uri,$controller){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>'POST'
        ];
    }
    public function delete($uri,$controller){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>'DELETE'
        ];
    }
    public function put($uri,$controller){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>'PUT'
        ];
    }
    public function patch($uri,$controller){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>'PATCH'
        ];
    }
    public function router($uri,$method){
        foreach ($this->routes as $routes){
            if ($routes['uri']===$uri && $routes['method']===$method){
                require $routes['controller'];
            }else{
                $this->abort();
            }
        }
    }
    protected function abort($error=404){
            http_response_code($error);
            require "../views/{$error}.php";
            die();
        }
}
