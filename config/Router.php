<?php

namespace App\config;

use App\src\controller\BackController;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;

use Exception;

class Router
{
    private $backController;
    private $frontController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->backController = new BackController();
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->request = new Request();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');

        try {
            if (isset($route)) {
                if ($route === 'home') {
                    $this->frontController->home();
                } else if ($route === 'menu') {
                    $this->frontController->menu();
                } else if ($route === 'contact') {
                    $this->frontController->contact();
                } elseif ($route === 'register') {
                    $this->frontController->register($this->request->getPost());
                } elseif ($route === 'login') {
                    $this->frontController->login($this->request->getPost());
                } elseif ($route === 'logout') {
                    $this->backController->logout();
                } elseif ($route === 'administration') {
                    $this->backController->administration();
                } elseif ($route === 'addPizza') {
                    $this->backController->addPizza($this->request->getPost());
                } elseif ($route === 'editPizza') {
                    $this->backController->editPizza($this->request->getPost(), $this->request->getGet()->get('id'));
                } elseif ($route === 'deletePizza') {
                    $this->backController->deletePizza($this->request->getGet()->get('id'));
                } elseif ($route === 'deleteAccount') {
                    $this->backController->deleteAccount();
                } else {
                    $this->errorController->errorNotFound();
                }
            } else {
                $this->frontController->home();
            }
        } catch (Exception $e) {
            $this->errorController->errorServer($e);
        }
    }
}
