<?php

namespace Framework\Router;

use Framework\Config\Config;

class Router
{
    protected $uri;
    protected $route;
    protected $language;
    protected $controller;
    protected $action;
    protected $params = [];

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function run($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));
        $this->language = Config::get('defaultLanguage');
        $this->route = Config::get('defaultRoute');
        $this->controller = Config::get('defaultController');
        $this->action = Config::get('defaultAction');

        if (empty($this->uri)) {
            return false;
        }

        $this->uri = str_replace('winrol/', '', $this->uri);

        $parts = explode('?', $this->uri);
        $parts = trim($parts[0], '/');
        $parts = explode('/', $parts);

        $currentPart = strtolower(current($parts));
        $route = array_search(
            $currentPart,
            Config::get('routes')
        );

        if (!empty($route)) {
            $this->route = $route;
            array_shift($parts);
        }

        if (empty($parts)) {
            return false;
        }

        $currentPart = strtolower(current($parts));

        if (in_array($currentPart, Config::get('languages'))) {
            $this->language = $currentPart;
            array_shift($parts);
        }

        if (empty($parts)) {
            return false;
        }

        $this->controller = strtolower(current($parts));
        array_shift($parts);

        if (empty($parts)) {
            return false;
        }

        $this->action = strtolower(current($parts));
        array_shift($parts);

        $this->params = $parts;

        return true;
    }
}
