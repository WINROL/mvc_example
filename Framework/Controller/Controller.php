<?php

namespace Framework\Controller;

use Framework\Model\Model;
use Framework\Router\Router;

class Controller
{
    /**
     * @var \Framework\Router\Router
     */
    protected $router;

    protected $data = [];

    protected $model = null;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getRouter()
    {
        return $this->router;
    }

    public function getParams()
    {
        return $this->router->getParams();
    }

    public function __construct(Router $router, Model $model = null)
    {
        $this->router = $router;
        $this->model = $model;
    }
}
