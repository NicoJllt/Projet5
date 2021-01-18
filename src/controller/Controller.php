<?php

namespace App\src\controller;

use App\config\Request;
use App\src\constraint\Validation;
use App\src\DAO\PizzaDAO;
use App\src\DAO\OtherDAO;
use App\src\DAO\SettingDAO;
use App\src\DAO\UserDAO;
use App\src\model\View;

abstract class Controller
{
    protected $pizzaDAO;
    protected $otherDAO;
    protected $settingDAO;
    protected $userDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->pizzaDAO = new PizzaDAO();
        $this->otherDAO = new OtherDAO();
        $this->settingDAO = new SettingDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
