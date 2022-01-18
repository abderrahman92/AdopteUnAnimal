<?php
namespace Core;

class Router
{
    private $idArray;

    function __construct($page, $routes)
    {
        $this->controllerName = null;
        $this->page = $page;
        $this->routes = $routes;
    }

    public function loadController(){
        //pour trouver le nom de controller
        foreach ($this->routes as $key => $val) {
            if ($val[0] === $this->page) {
                $this->controllerName = $this->routes[$key][1];
            }
        }
        $class = "App\\".$this->controllerName;
        $page = new $class();
        $page->view();
    }
}
