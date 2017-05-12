<?php

namespace Controller\Frontend;

use Framework\Controller\Controller;
use Model\Page;

class PageController extends Controller
{
    /**
     * @var Page
     */
    protected $model = null;

    public function indexAction()
    {
        //call model
        $this->data['pages'] = $this->model->getAllPages();
    }

    public function viewAction()
    {
        $alias = $this->getParams()[0];

        $page = $this->model->getPageByAlias($alias);
        if (false !== $page) {
            $this->data = $page;
        }
    }
} 