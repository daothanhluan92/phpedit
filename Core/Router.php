<?php
namespace Core;

class Router{
    protected $routes = [];
    public function add($uri,$controller,$method){
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>$method,
            'middleware'=>null
        ];
        return $this;
    }
    public function get($uri,$controller){
        return $this->add($uri,$controller,'GET');
    }
    public function post($uri,$controller){
       return $this->add($uri,$controller,'POST');
    }
    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware']=$key;
        return $this;
    }
    public function delete($uri,$controller){
        return $this->add($uri,$controller,'DELETE');
    }
    public function put($uri,$controller){
        return $this->add($uri,$controller,'PUT');
    }
    public function patch($uri,$controller){
        return $this->add($uri,$controller,'PATCH');
    }
    public function router($uri,$method){
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri and $route['method'] === strtoupper($method)) {
                if ($route['middleware'] === 'auth') {
                    if ($_SESSION['name'] ?? false) {
                        header('location:/');
                        exit();
                    }
                }
                return require base_path($route['controller']);
            }
        }
        $this->abort();
        }
    protected function abort($error=404){
            http_response_code($error);
            require "../views/{$error}.php";
            die();
        }
}
