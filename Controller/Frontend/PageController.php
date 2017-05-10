<?php

namespace Controller\Frontend;

use Framework\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        //call model
        $this->data['pages'] = [
            0 => [
                'title' => 'About',
                'url' => 'tets',
            ],
            1 => [
                'title' => 'Test',
                'url' => 'tets',
            ],
        ];
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