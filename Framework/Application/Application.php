<?php

namespace Framework\Application;

use Controller\Frontend\PageController;
use Framework\Config\Config;
use Framework\Lang\Lang;
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

        Lang::load(self::$router->getLanguage());

        $controllerStr = ucfirst(self::$router->getController());
        $controllerName = CONTROLLER_NS
            . ucfirst(self::$router->getRoute())
            . DS
            . $controllerStr
            . 'Controller'
        ;
        $actionName = self::$router->getAction() . 'Action';

        //model
        $modelName = MODEL_NS . $controllerStr;
        $model = null;
        if (class_exists($modelName)) {
            $model = new $modelName($db);
        }

        //call controller
        $controller = new $controllerName(self::$router, $model);
        $controller->$actionName();

        //view
        $view = new View($controller->getData());
        $content = $view->render();

        //layout
        $layoutPath = VIEW_DIR . self::$router->getRoute()
            . DS . Config::get('defaultLayout') . '.php'
        ;

        //$data['content'] = $content;
        $layout = new View(compact('content'), $layoutPath);
        echo $layout->render();
    }
}