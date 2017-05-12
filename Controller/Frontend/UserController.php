<?php

namespace Controller\Frontend;

use Framework\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {

    }

    public function registrationAction()
    {
        $params = $_POST;

        //redirect
    }

    public function loginAction()
    {
        $params = $_POST;

        //getUserByEmail
        //check fields

        //redirect
    }

    public function logoutAction()
    {
        $params = $_POST;
        //destroy session

        //redirect
    }
} 