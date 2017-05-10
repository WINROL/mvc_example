<?php

namespace Framework\Application;

use Controller\Frontend\PageController;
use Framework\Config\Config;
use Framework\Router\Router;
use Framework\View\View;
use Model\Page;

class Application
{
    /**
     * @var Router $router
     */
    protected static $router;

    public static function getRouter()
    {
        return self::$router;
    }

    public static function run(Router $router, \PDO $db)
    {
        self::$router = $router;
        self::$router->run($_SERVER['REQUEST_URI']);

        //model
        $model = new Page($db);

        //controller
        $controller = new PageController(self::$router, $model);
        $controller->viewAction();

        //view
        $view = new View($controller->getData());
        $content = $view->render();

        //layout
        $layoutPath = VIEW_DIR . self::$router->getRoute()
            . DS . Config::get('defaultLayout') . '.php'
        ;
        echo $layoutPath;

        //$data['content'] = $content;
        $layout = new View(compact('content'), $layoutPath);
        echo $layout->render();
    }
}