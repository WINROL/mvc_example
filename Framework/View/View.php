<?php

namespace Framework\View;

use Framework\Application\Application;

class View
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var null|string
     */
    protected $path = null;

    protected function setDefaultPath()
    {
        $route = Application::getRouter()->getRoute();
        $controller = Application::getRouter()->getController();
        $action = Application::getRouter()->getAction();

        $this->path = VIEW_DIR . $route . DS . $controller
            . DS . $action . '.php'
        ;
    }

    public function __construct(array $data = [], $path = null)
    {
        $this->data = $data;
        $this->path = $path;

        if (null === $this->path) {
            $this->setDefaultPath();
        }

        if (!file_exists($this->path)) {
            throw new \Exception('Not Found View file.');
        }
    }

    public function render()
    {
        $data = $this->data;

        ob_start();
        require_once $this->path;

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
